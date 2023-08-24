<?php

namespace App\Http\Requests\Api\Admin\Room;

use App\Services\Dto\Room\UpdateImageRoomDto;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UpdateImageRoomRequest extends FormRequest {
    
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
    #[ArrayShape(['photo' => "string"])]
    public function rules(): array
    {
        
        return [
            'photo' => 'required|image',
        ];
    }
    
    /**
     * @return \App\Services\Dto\Room\UpdateImageRoomDto
     */
    public function getDto(): UpdateImageRoomDto
    {
        
        return new UpdateImageRoomDto($this->file('photo'));
    }
}
