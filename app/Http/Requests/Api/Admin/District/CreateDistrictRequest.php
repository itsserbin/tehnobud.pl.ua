<?php

namespace App\Http\Requests\Api\Admin\District;

use App\Domain\ValueObject\Name;
use App\Services\Dto\District\DistrictUpdateDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;
use Ramsey\Uuid\Uuid;

/**
 * Class CreateDistrictRequest
 *
 * @package App\Http\Requests\Api\Admin\District
 */
class CreateDistrictRequest extends FormRequest
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
        'city_id' => "array",
    ])]
    public function rules(): array
    {
        return [
            'name'    => 'required|array',
            'name.ru' => 'required|string',
            'name.ua' => 'required|string',
            'city_id' => [
                'required',
                Rule::exists('cities', 'id'),
            ],
        ];
    }

    /**
     * @return \App\Services\Dto\District\DistrictUpdateDto
     */
    public function getDto(): DistrictUpdateDto
    {
        return new DistrictUpdateDto(
            Name::create($this->get('name')),
            Uuid::fromString($this->get('city_id'))
        );
    }

}
