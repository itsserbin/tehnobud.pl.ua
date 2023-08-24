<?php

namespace App\Http\Requests\Api\Site\Forms;

use App\Services\Dto\Forms\CallbackFormsDto;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class CallbackFormRequest extends FormRequest
{
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape([
        'name'      => "string",
        'phone'     => "string",
        'email'     => "string",
        'url'       => "string",
        'name_form' => "string",
    ])]
    public function rules(): array
    {
        return [
            'name'      => 'required|string',
            'phone'     => 'required|string',
            'email'     => 'nullable|email',
            'url'       => 'required|url',
            'name_form' => 'required|string',
        ];
    }
    
    /**
     * @return \App\Services\Dto\Forms\CallbackFormsDto
     */
    public function getDto(): CallbackFormsDto
    {
        return new CallbackFormsDto(
            $this->get('name'),
            $this->get('email'),
            $this->get('phone'),
            $this->get('url'),
            $this->get('name_form')
        );
    }
    
}
