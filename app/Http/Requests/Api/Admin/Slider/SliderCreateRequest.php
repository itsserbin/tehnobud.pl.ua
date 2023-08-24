<?php

namespace App\Http\Requests\Api\Admin\Slider;

use App\Services\Dto\Slider\CreateSliderDto;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

final class SliderCreateRequest extends FormRequest {
    
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
    #[ArrayShape(['sliders' => "string", 'sliders.*' => "string"])]
    public function rules(): array
    {
        
        return [
            'sliders'     => 'nullable|array',
            'sliders.*'   => 'required|image',
        ];
    }
    
    /**
     * @return \App\Services\Dto\Slider\CreateSliderDto
     */
    public function getDto(): CreateSliderDto
    {
        
        return new CreateSliderDto(
            $this->file('sliders', []),
        );
    }
    
}
