<?php

namespace App\Mail;

use App\Services\Dto\Forms\SubscribeDto;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscribeFormMail extends Mailable {
    
    use Queueable, SerializesModels;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(private SubscribeDto $dto)
    {
        //
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this
            ->subject("Новая подписка с сайта")
            ->to(config('app.admin_email'))
            ->view(
                'email.subscribe-form',
                [
                    'dto' => $this->dto,
                ]
            );
    }
}
