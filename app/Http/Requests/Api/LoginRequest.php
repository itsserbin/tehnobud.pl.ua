<?php

namespace App\Http\Requests\Api;

use App\Services\Dto\Login\LoginDto;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class LoginRequest extends FormRequest
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
    #[ArrayShape(['login' => "string[]", 'password' => "string[]"])]
    public function rules(): array
    {
        return [
            'login'    => [
                'required',
                'string',
            ],
            'password' => [
                'required',
                'string',
            ],
        ];
    }

    public function getDto(): LoginDto
    {
        return new LoginDto(
            $this->get('login'),
            $this->get('password')
        );
    }

}
