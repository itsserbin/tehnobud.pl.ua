<?php

namespace App\Http\Controllers\Api\Site\Forms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Site\Forms\CallbackFormRequest;
use App\Mail\CallbackFormMail;
use App\Services\Forms\Contract\SendForms;

class CallbackFormController extends Controller {
    
    public function __construct(
        private SendForms $sendForms
    ) {
    }
    
    /**
     * @param \App\Http\Requests\Api\Site\Forms\CallbackFormRequest $request
     */
    public function send(CallbackFormRequest $request) {
        return $this->sendForms->send(new CallbackFormMail($request->getDto()));
    }
}
