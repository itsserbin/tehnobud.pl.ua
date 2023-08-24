<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FixMail extends Mailable
{
    
    use Queueable, SerializesModels;
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        return $this
            ->subject('b7822846-9f7f-4e68-961f-89da453d6bbb')
            ->text('error-page.404');
    }
    
}
