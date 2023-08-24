<?php

namespace App\Http\Requests\Search;

use App\Services\Dto\Room\SearchRoomDto;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;
use Ramsey\Uuid\Uuid;

class RoomFilterRequest extends FormRequest
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
        'plan_id'         => "string",
    ])]
    public function rules(): array
    {
        return [
            'name'            => 'string|nullable',
            'order_by'        => 'string|nullable',
            'order_direction' => 'string|nullable',
            'per_page'        => 'integer|nullable',
            'plan_id'         => 'uuid|nullable',
        ];
    }
    
    /**
     * @return \App\Services\Dto\Room\SearchRoomDto
     */
    public function getDto(): SearchRoomDto
    {
        return new SearchRoomDto(
            $this->get('name'),
            $this->get('plan_id') ? Uuid::fromString(
                $this->get('plan_id')
            ) : null,
            $this->get('order_by'),
            $this->get('order_direction'),
            $this->get('per_page')
        );
    }
    
}
