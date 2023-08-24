<?php

namespace App\Http\Requests\Api\Admin\City;

use App\Domain\ValueObject\Name;
use App\Services\Dto\City\CityCreateDto;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class CreateCityRequest extends FormRequest
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
        'name'    => "string",
        'name.ru' => "string",
        'name.ua' => "string",
    ])]
    public function rules(): array
    {
        return [
            'name'    => 'required|array',
            'name.ru' => 'required|string',
            'name.ua' => 'required|string',
        ];
    }

    public function getDto(): CityCreateDto
    {
        return new CityCreateDto(
            Name::create($this->get('name'))
        );
    }

}
