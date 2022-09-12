<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentProvider;
use App\Models\Registration;
use App\Models\RegistrationDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Registration $registration)
    {   
        // PAYMENT REQUEST VALIDATION
        if ($registration->payment_due < Carbon::now()) {
            return redirect()->route('registrations.index')->with('failed', 'You have run out of time to complete the payment!');
        }

        $paymentSummaries = 
            DB::table('registration_details')
                ->join('competitions', 'registration_details.competition_id', 'competitions.id')
                ->select('competitions.name', 'competitions.category', 'registration_details.price', DB::raw('count(*) as total'))
                ->where('registration_details.registration_id', $registration->id)
                ->groupBy('competitions.name', 'competitions.category', 'registration_details.price')
                ->get();

        $totalPayment = 0;
        foreach ($paymentSummaries as $paymentSummary) {
            $totalPayment += $paymentSummary->price * $paymentSummary->total;
        }
        
        return view('payments.create', [
            'registration' => $registration,
            'paymentSummaries' => $paymentSummaries,
            'totalPayment' => $totalPayment,
            'paymentProviders' => PaymentProvider::all(),
            'bankCount' => PaymentProvider::where('type', 'BANK')->count(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // PAYMENT REQUEST VALIDATION
        if ($request->payment_due < Carbon::now()) {
            return redirect()->route('registrations.index')->with('failed', 'You have run out of time to complete the payment!');
        }

        $request->validate([
            'registration_id'=> 'required|integer',
            'payment_type'=> 'required|string',
            'provider_name'=> 'required|string',
            'account_number'=> 'required|string',
            'account_name'=> 'required|string',
            'payment_amount'=> 'required|integer',
            'payment_proof' => 'image|nullable|max:1999|mimes:jpg,png,jpeg',
        ]);

        if ($request->hasFile('payment_proof')) {
            $extension = $request->file('payment_proof')->getClientOriginalExtension();
            $proofNameToStore = $request->input('account_number') . '_' . $request->input('account_name') . '_' . time() . '.' . $extension;
            $request->file('payment_proof')->storeAs('public/images/payment_proofs', $proofNameToStore);
        }

        Payment::create([
            'registration_id' => $request->registration_id,
            'payment_type' => $request->payment_type,
            'provider_name' => $request->provider_name,
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
            'payment_amount' => $request->payment_amount,
            'payment_proof' => $proofNameToStore,
            'is_confirmed' => 0,
        ]);

        return redirect()->route('registrations.index')->with('success', 'Please wait for payment verification from the committee.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
