<?php

namespace App\Services\Forms\Contract;

use Illuminate\Mail\Mailable;

interface SendForms {
    
    public function send(Mailable $mail_event);
    
}