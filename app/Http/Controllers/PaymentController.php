<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentProvider;
use App\Models\Registration;
use App\Models\RegistrationDetail;
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
    public function create(Request $request)
    {   
        $registration_id = $request->registration_id;

        $registration_details = 
            DB::table('registration_details')
                ->join('competitions', 'registration_details.competition_id', 'competitions.id')
                ->select('competitions.name', 'registration_details.price', DB::raw('count(*) as total'))
                ->where('registration_details.registration_id', $registration_id)
                ->groupBy('competitions.name', 'registration_details.price')
                ->get();

        $amounts = [];        
        $totalPayment = null;

        for ($i=0; $i < $registration_details->count(); $i++) { 
            $amounts[$i] = $registration_details[$i]->price * $registration_details[$i]->total;
            $totalPayment += $amounts[$i];
        }
        
        return view('payments.create', [
            'registration_id' => $registration_id,
            'registration_details' => $registration_details,
            'prices' => $amounts,
            'totalPayment' => $totalPayment,
            'paymentProviders' => PaymentProvider::all(),
            'ewalletCount' => PaymentProvider::where('type', 'EWALLET')->count(),
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
        //
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
