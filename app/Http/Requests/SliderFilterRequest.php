<?php

namespace App\Http\Requests;

use App\Services\Dto\Slider\SearchSliderDto;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;
use Ramsey\Uuid\Uuid;

class SliderFilterRequest extends FormRequest
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
        'building_id'     => "string",
        'order_by'        => "string",
        'order_direction' => "string",
        'per_page'        => "string",
    ])]
    public function rules(): array
    {
        return [
            'building_id'     => 'nullable|uuid',
            'order_by'        => 'string|nullable',
            'order_direction' => 'string|nullable',
            'per_page'        => 'integer|nullable',
        ];
    }
    
    public function getDto(): SearchSliderDto
    {
        return new SearchSliderDto(
            $this->get('building_id') ?
                Uuid::fromString(
                    $this->get('building_id')
                ) : null,
            $this->get('order_by'),
            $this->get('order_direction'),
            $this->get('per_page')
        );
    }
    
}
