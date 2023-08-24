<?php

namespace App\Http\Requests\Api\Site\Forms;

use App\Services\Dto\Forms\SubscribeDto;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class SubscribeRequest extends FormRequest
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
        'email'     => "string",
        'url'       => "string",
        'name_form' => "string",
    ])]
    public function rules(): array
    {
        return [
            'email'     => 'required|email',
            'url'       => 'required|url',
            'name_form' => 'required|string',
        ];
    }
    
    /**
     * @return
     */
    public function getDto(): SubscribeDto
    {
        return new SubscribeDto(
            $this->get('email'),
            $this->get('url'),
            $this->get('name_form')
        );
    }
    
}
