<?php

namespace App\Mail;

use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public Payment $payment;
   
    public function __construct(Payment $payment)
    {   
        $this->payment = $payment;
    }

    public function build()
    {   
        $competitions = DB::table('competitions')
                            ->join('registration_details', 'competitions.id', 'registration_details.competition_id')
                            ->select('competitions.name', 'competitions.category', 'registration_details.price', 'registration_details.type', DB::raw('count(*) as registrations_count'))
                            ->where('registration_details.registration_id', $this->payment->registration->id)
                            ->groupBy('competitions.name', 'competitions.category', 'registration_details.price', 'registration_details.type')
                            ->get();

        $invoiceFile = Pdf::loadView('payments.invoice', [
                            'payment' => $this->payment,
                            'competitions' => $competitions,
                        ]);
        
        $invoiceID = str_pad($this->payment->id, 3, '0', STR_PAD_LEFT);
        
        return $this->markdown('emails.invoices.mail')
                    ->subject('NEO 2022 - Invoice ' . $invoiceID)
                    ->attachData($invoiceFile->output(), 'Invoice ' . $invoiceID .'.pdf');
    }
}
