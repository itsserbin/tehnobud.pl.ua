<?php

namespace App\Http\Requests\Api\Admin\Slider;

use App\Domain\ValueObject\Building\Priority;
use App\Services\Dto\Slider\UpdateSliderDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;
use Ramsey\Uuid\Uuid;

class UpdatePhotoSliderRequest extends FormRequest {
    
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
        'photo'       => "string",
        'building_id' => "array",
        'priority'    => "string",
    ])]
    public function rules(): array
    {
        
        return [
            'photo'       => 'required|image',
            'building_id' => [
                'required',
                Rule::exists(
                    'buildings',
                    'id',
                ),
                'uuid',
            ],
            'priority'    => 'nullable|integer',
        ];
    }
    
    
    /**
     * @return \App\Services\Dto\Slider\UpdateSliderDto
     */
    public function getDto(): UpdateSliderDto
    {
        
        return new UpdateSliderDto(
            $this->file('photo'),
            Uuid::fromString($this->get('building_id')),
            Priority::create(
                (int)$this->get(
                    'priority',
                    1
                )
            )
        );
    }
}


