<?php

namespace App\Mail;

use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use PDF; 

class PaymentMail extends Mailable
{
    use Queueable, SerializesModels;

    public Payment $payment;
   
    public function __construct(Payment $payment)
    {   
        $this->payment = $payment;
    }

    public function build()
    {   
        $id = str_pad($this->payment->id, 3, '0', STR_PAD_LEFT);
        
        if ($this->payment->is_verified == true) {
            $competitions = DB::table('competitions')
                ->join('registration_details', 'competitions.id', 'registration_details.competition_id')
                ->select('competitions.name', 'competitions.category', 'registration_details.price', 'registration_details.type', DB::raw('count(*) as registrations_count'))
                ->where('registration_details.registration_id', $this->payment->registration->id)
                ->groupBy('competitions.name', 'competitions.category', 'registration_details.price', 'registration_details.type')
                ->get();

            $invoice = PDF::loadView('payments.invoice', [
                'payment' => $this->payment,
                'competitions' => $competitions
            ]);

            $invoice->setPaper('a4')->setOption('enable-local-file-access', true);
        
            return $this->markdown('emails.payments.accept-mail')
                ->subject('NEO 2022 - Invoice ' . $id)
                ->attachData($invoice->output(), 'Invoice ' . $id .'.pdf');
        } else {
            return $this->markdown('emails.payments.reject-mail')
                ->subject('NEO 2022 - Payment ' .$id . ' Rejected');
        }

    }
}
