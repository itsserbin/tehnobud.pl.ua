<?php

namespace App\Http\Controllers\Api\Site\Forms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Site\Forms\SubscribeRequest;
use App\Mail\SubscribeFormMail;
use App\Services\Forms\Contract\SendForms;

class SubscribeController extends Controller {
    
    public function __construct(
        private SendForms $sendForms
    ) {
    }
    
    public function send(SubscribeRequest $request)
    {
        
        return $this->sendForms->send(new SubscribeFormMail($request->getDto()));
    }
}
