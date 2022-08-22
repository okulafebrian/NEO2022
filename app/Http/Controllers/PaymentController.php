<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

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

    public function paymentMethod(Request $request){
        return view('payments/method');

        $request->session()->put('method', 'method');
        $request->session()->put('account_name', 'account_name');
        $request->session()->put('account_number', 'account_number');
    }

    public function paymentConfirmation(){
        $paymentMethod = session('method');

        return view('payments/confirmation', [
            "method" => $paymentMethod,
        ]);

        // return view('payments/confirmation');
    }

    public function save_payment(Request $request){

        // $request->validate([
        //     'name'=>'required|string',
        //     'address'=>'required|string',
        //     'age'=>'required|integer',
        //     'picture' => 'required|image\max:1999|mimes:jpg,png,jpeg',
        // ]);

        if($request->hasFile('picture')){
            $extension = $request->file('picture')->getClientOriginalExntension();
            $file_name = $request->name.'.'.$extension;
            $path = $request->file('picture')->storeAs('public/images/participant', $file_name);
        }
        
        DB::table('payments')->insert([
            'method' => $request->paymentMethod,
            'account_name' => $request->accountName,
            'account_number' => $request->accountNumber,
            'picture' => $file_name
        ]);
      }
}
