<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Payment;
use App\Models\PaymentProvider;
use App\Models\Promotion;
use App\Models\PromotionDetail;
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
        // PAYMENT DUE VALIDATION
        if (strtotime($registration->payment_due) < time() && !$registration->payment) {
            return redirect()->route('registrations.index')->with('failed', 'Your payment due has expired.');
        }

        $competitions = DB::table('competitions')
                        ->join('registration_details', 'competitions.id', 'registration_details.competition_id')
                        ->select('competitions.name', 'competitions.category', 'registration_details.price', DB::raw('count(*) as registrations_count'))
                        ->where('registration_details.registration_id', $registration->id)
                        ->groupBy('competitions.name', 'competitions.category', 'registration_details.price')
                        ->get();

        return view('payments.create', [
            'registration' => $registration,
            'competitions' => $competitions,
            'payment_amount' => $registration->competitions->sum('price'),
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
        $request->validate([
            'registration_id'=> 'required|integer',
            'payment_method'=> 'required|string',
            'account_number'=> 'required|string',
            'account_name'=> 'required|string',
            'payment_amount'=> 'required|integer',
            'payment_proof' => 'image|max:1999|mimes:jpg,png,jpeg',
        ]);

        // PAYMENT DUE VALIDATION
        $registration = Registration::find($request->registration_id);
     
        if (strtotime($registration->payment_due) < time() && !$registration->payment) {
            return redirect()->route('registrations.index')->with('failed', 'Your payment due has expired.');
        }
        
        if ($request->hasFile('payment_proof')) {
            $extension = $request->file('payment_proof')->getClientOriginalExtension();
            $proofNameToStore = $request->input('account_number') . '_' . $request->input('account_name') . '_' . time() . '.' . $extension;
            $request->file('payment_proof')->storeAs('public/images/payment_proofs', $proofNameToStore);
        }

        $payment_type = explode(" ", $request->payment_method)[0];
        $provider_name = explode(" ", $request->payment_method)[1];

        Payment::create([
            'registration_id' => $request->registration_id,
            'payment_type' => $payment_type,
            'provider_name' => $provider_name,
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
            'payment_amount' => $request->payment_amount,
            'payment_proof' => $proofNameToStore,
            'is_verified' => 0,
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
        return view('payments.edit', [
            'payment' => $payment,
        ]);
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
        $request->validate([
            'account_number' => 'required|string',
            'account_name' => 'required|string',
            'payment_proof' => 'required|image|max:1999|mimes:jpg,png,jpeg',
        ]);
        
        if ($request->hasFile('payment_proof')) {
            $extension = $request->file('payment_proof')->getClientOriginalExtension();
            $proofNameToStore = $request->input('account_number') . '_' . $request->input('account_name') . '_' . time() . '.' . $extension;
            $request->file('payment_proof')->storeAs('public/images/payment_proofs', $proofNameToStore);
        }

        $payment->update([
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
            'payment_proof' => $proofNameToStore,
        ]);

        return redirect()->route('registrations.index')->with('success', 'Data updated successfully.');
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

    public function accept(Payment $payment)
    {
        $payment->update([
            'is_verified' => 1,
        ]);

        return redirect()->route('registrations.manage')->with('success', 'Payment Verified');
    }
}
