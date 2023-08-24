<?php

namespace App\Http\Requests;

use App\Services\Dto\City\SearchCityDto;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class CityFilterRequest
 *
 * @package App\Http\Requests
 */
class CityFilterRequest extends FormRequest
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
        'name'            => "string",
        'order_by'        => "string",
        'order_direction' => "string",
        'per_page'        => "string",
    ])]
    public function rules(): array
    {
        return [
            'name'            => 'string|nullable',
            'order_by'        => 'string|nullable',
            'order_direction' => 'string|nullable',
            'per_page'        => 'integer|nullable',
        ];
    }

    /**
     * @return \App\Services\Dto\City\SearchCityDto
     */
    public function getDto(): SearchCityDto
    {
        return new SearchCityDto(
            name: $this->get('name'),
            orderBy: $this->get('order_by'),
            orderDirection: $this->get('order_direction'),
            per_page: (int) $this->get('per_page')
        );
    }

}
