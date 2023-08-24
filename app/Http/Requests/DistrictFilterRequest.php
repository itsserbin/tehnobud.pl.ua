<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Services\Dto\District\SearchDistrictDto;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;
use Ramsey\Uuid\Uuid;

final class DistrictFilterRequest extends FormRequest
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
        'city'            => "string",
    ])]
    public function rules(): array
    {
        return [
            'name'            => 'string|nullable',
            'order_by'        => 'string|nullable',
            'order_direction' => 'string|nullable',
            'per_page'        => 'integer|nullable',
            'city'            => 'uuid|nullable',
        ];
    }

    /**
     * @return \App\Services\Dto\District\SearchDistrictDto
     */
    public function getDto(): SearchDistrictDto
    {
        return new SearchDistrictDto(
            name: $this->get('name'),
            city: $this->get('city')
            ? Uuid::fromString($this->get('city')) : null,
            order_by: $this->get('order_by'),
            order_direction: $this->get('order_direction'),
            per_page: (int) $this->get('per_page')
        );
    }

}
