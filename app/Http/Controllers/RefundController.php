<?php

namespace App\Http\Controllers;

use App\Mail\RefundMail;
use App\Models\PaymentProvider;
use App\Models\Refund;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RefundController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['user'])->only('create', 'store');
        $this->middleware(['admin'])->only('accept', 'reject');
        // $this->middleware(['admin'])->only(['accept', 'reject', 'downloadInvoice']);
        // $this->middleware('access.control:10')->except('index');
    }

    public function index()
    {
        //
    }

    public function create(Registration $registration)
    {   
        $competitions = DB::table('competitions')
                        ->join('registration_details', 'competitions.id', 'registration_details.competition_id')
                        ->select('competitions.name', 'competitions.category', 'registration_details.price', DB::raw('count(*) as registrations_count'))
                        ->where('registration_details.registration_id', $registration->id)
                        ->groupBy('competitions.name', 'competitions.category', 'registration_details.price')
                        ->get();

        return view('refunds.create', [
            'registration' => $registration,
            'competitions' => $competitions,
            'payment_amount' => $registration->competitions->sum('pivot.price'),
            'paymentProviders' => PaymentProvider::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'registration_id'=> 'required|integer',
            'payment_method'=> 'required|string',
            'account_number'=> 'required|string',
            'account_name'=> 'required|string',
            'bank_name' => 'required|string',
            'dest_account_number'=> 'required|string',
            'dest_account_name'=> 'required|string',
            'payment_amount'=> 'required|integer',
            'payment_proof' => 'image|max:1999|mimes:jpg,png,jpeg',
        ]);
        
        if ($request->hasFile('payment_proof')) {
            $extension = $request->file('payment_proof')->getClientOriginalExtension();
            $proofNameToStore = $request->input('account_number') . '_' . $request->input('account_name') . '_' . time() . '.' . $extension;
            $request->file('payment_proof')->storeAs('public/images/refund_proofs', $proofNameToStore);
        }

        Refund::create([
            'registration_id' => $request->registration_id,
            'payment_method' => $request->payment_method,
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
            'bank_name' => $request->bank_name,
            'dest_account_number'=> $request->dest_account_number,
            'dest_account_name'=> $request->dest_account_name,
            'payment_amount' => $request->payment_amount,
            'payment_proof' => $proofNameToStore,
        ]);

        return redirect()->route('registrations.index')->with('success', 'Please wait for refund verification from the committee.');
    }

    public function show(Refund $refund)
    {
        //
    }

    public function edit(Refund $refund)
    {
        //
    }

    public function update(Request $request, Refund $refund)
    {
        //
    }

    public function destroy(Refund $refund)
    {
        //
    }

    public function accept(Request $request, Refund $refund)
    {   
        $request->validate([
            'proof' => 'required|image|max:1999|mimes:jpg,png,jpeg',
        ]);
        
        DB::transaction(function () use($request, $refund) {
            if ($request->hasFile('proof')) {
                $extension = $request->file('proof')->getClientOriginalExtension();
                $proofNameToStore = 'Refund_' . str_pad($refund->id, 3, '0', STR_PAD_LEFT) . '_' . time() . '.' . $extension;
                $request->file('proof')->storeAs('public/images/transfer_proofs', $proofNameToStore);
            }

            // UPDATE VERIFIY
            $refund->update([
                'proof' => $proofNameToStore,
                'is_verified' => 1,
            ]);
            
            // SEND INVOICE MAIL
            Mail::to($refund->registration->user->email)->send(new RefundMail($refund));
        });

        return redirect()->route('registrations.manage')->with('success', 'Refund accepted.');
    }

    public function reject(Refund $refund)
    {   
       $refund->delete();
            
        // SEND INVOICE MAIL
        Mail::to($refund->registration->user->email)->send(new RefundMail($refund));

        return redirect()->route('registrations.manage')->with('success', 'Refund rejected');
    }
}
