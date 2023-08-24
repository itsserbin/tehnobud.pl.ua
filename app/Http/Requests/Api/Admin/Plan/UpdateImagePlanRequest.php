<?php

namespace App\Http\Requests\Api\Admin\Plan;

use App\Services\Dto\Plan\UpdatePlanImageDto;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UpdateImagePlanRequest extends FormRequest {
    
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
    #[ArrayShape(['plan' => "string"])]
    public function rules(): array
    {
        
        return [
            'plan' => 'required|image',
        ];
    }
    
    public function getDto(): UpdatePlanImageDto
    {
        
        return new UpdatePlanImageDto(
            $this->file('plan')
        );
    }
}
