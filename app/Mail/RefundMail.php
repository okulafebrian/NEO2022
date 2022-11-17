<?php

namespace App\Mail;

use App\Models\Refund;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class RefundMail extends Mailable
{
    use Queueable, SerializesModels;

    public Refund $refund;
   
    public function __construct(Refund $refund)
    {   
        $this->refund = $refund;
    }

    public function build()
    {   
        if ($this->refund->is_verified == true) {
            return $this->markdown('emails.refunds.accept-mail')
                    ->subject('NEO 2022 - Refund Request Accepted')
                    ->attach(public_path('/storage/images/transfer_proofs/' . $this->refund->proof), [
                        'as' => $this->refund->proof
                    ]);

        } else {
        
            return $this->markdown('emails.refunds.reject-mail')
                    ->subject('NEO 2022 - Refund Request Rejected');
        }
    }
}
