<?php

namespace App\Mail;

use App\Models\Participant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountMail extends Mailable
{
    use Queueable, SerializesModels;

    public Participant $participant;
   
    public function __construct(Participant $participant)
    {   
        $this->participant = $participant;
    }

    public function build()
    {   
        return $this->markdown('emails.accounts.mail')
                    ->subject('NEO 2022 - Participant Account Information');
    }
}
