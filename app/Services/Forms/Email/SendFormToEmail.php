<?php

namespace App\Services\Forms\Email;

use App\Services\Forms\Contract\SendForms;
use Illuminate\Mail\Mailable;
use Mail;

class SendFormToEmail implements SendForms {
    
    public function send(Mailable $mail_event)
    {
        Mail::to(config('app.admin_email'))
            ->send($mail_event);
    }
}