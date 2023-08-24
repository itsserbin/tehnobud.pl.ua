<?php

namespace App\Mail;

use App\Services\Dto\Forms\CallbackFormsDto;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CallbackFormMail extends Mailable {
    
    use Queueable, SerializesModels;
    
    private CallbackFormsDto $params;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(CallbackFormsDto $params) {
        
        $this->params = $params;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static {
        
        return $this
            ->subject("Новое обращение с сайта")
            ->view('email.callback-form', [
                'params' => $this->params
            ]);
    }
}
