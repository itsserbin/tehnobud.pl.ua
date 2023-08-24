<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Services\Dto\Building\SearchBuildingDto;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;
use Ramsey\Uuid\Uuid;

final class BuildingFilterRequest extends FormRequest
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
        'district_id'     => "string",
        'city_id'         => 'string',
    ])]
    public function rules(): array
    {
        return [
            'name'            => 'string|nullable',
            'order_by'        => 'string|nullable',
            'order_direction' => 'string|nullable',
            'per_page'        => 'integer|nullable',
            'district_id'     => 'nullable|uuid',
            'city_id'         => 'nullable|uuid',
        ];
    }
    
    /**
     * @return \App\Services\Dto\Building\SearchBuildingDto
     */
    public function getDto(): SearchBuildingDto
    {
        return new SearchBuildingDto(
            $this->get('name'),
            $this->get('order_by'),
            $this->get('order_direction'),
            (int)$this->get('per_page'),
            $this->get('district_id') ? Uuid::fromString($this->get('district_id')) : null,
            $this->get('city_id') ? Uuid::fromString($this->get('city_id')) : null,
        );
    }
    
}
