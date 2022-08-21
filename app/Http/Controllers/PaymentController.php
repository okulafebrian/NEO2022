<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index(){
        return view('payments/index');
    }

    public function index1(){
        return view('payments/index1');
    }

    public function pending(){
        return view('payments/pending');
    }

    public function pending1(){
        return view('payments/pending1');
    }

    public function completed(){
        return view('payments/completed');
    }

    public function completed1(){
        return view('payments/completed1');
    }

    public function expired(){
        return view('payments/expired');
    }

    public function expired1(){
        return view('payments/expired1');
    }

    public function paymentMethod(){
        return view('payments/method');
    }
}
