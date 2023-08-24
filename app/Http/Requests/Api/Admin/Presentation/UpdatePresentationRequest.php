<?php

namespace App\Http\Requests\Api\Admin\Presentation;

use App\Services\Dto\Presentation\UpdatePresentationDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;
use Ramsey\Uuid\Uuid;

class UpdatePresentationRequest extends FormRequest {
    
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
        'pdf'         => "string[]",
        'photo'       => "string[]",
        'building_id' => "array",
    ])]
    public function rules(): array
    {
        
        return [
            'pdf'         => [
                'nullable',
                'mimes:pdf',
            ],
            'photo'       => [
                'nullable',
                'image',
            ],
            'building_id' => [
                'required',
                'uuid',
                Rule::exists(
                    'buildings',
                    'id'
                ),
            ],
        ];
    }
    
    /**
     * @return \App\Services\Dto\Presentation\UpdatePresentationDto
     */
    public function getDto(): UpdatePresentationDto
    {
        return new UpdatePresentationDto(
            $this->file('pdf'),
            $this->file('photo'),
            Uuid::fromString($this->get('building_id'))
        );
    }
}
