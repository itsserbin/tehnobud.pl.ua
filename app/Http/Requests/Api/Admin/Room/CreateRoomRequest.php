<?php

namespace App\Http\Requests\Api\Admin\Room;

use App\Domain\ValueObject\Color;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Room\Area;
use App\Domain\ValueObject\Room\Coordinate;
use App\Domain\ValueObject\Room\Sale;
use App\Rules\HexColorRule;
use App\Services\Dto\Room\CreateRoomDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;
use Ramsey\Uuid\Uuid;

class CreateRoomRequest extends FormRequest {
    
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
        'name'       => "string",
        'name.ru'    => "string",
        'name.ua'    => "string",
        'color'      => "array",
        'is_sale'    => "string",
        'photo'      => "string",
        'plan_id'    => "array",
        'coordinate' => "string",
        'area'       => "string",
    ])]
    public function rules(): array
    {
        
        return [
            'name'       => 'required|array',
            'name.ru'    => 'required|string',
            'name.ua'    => 'required|string',
            'color'      => [
                new HexColorRule(),
                'required',
            ],
            'is_sale'    => 'required|boolean',
            'photo'      => 'required|image',
            'plan_id'    => [
                'uuid',
                Rule::exists(
                    'plans',
                    'id'
                ),
                'required',
            ],
            'coordinate' => 'required|string',
            'area'       => 'required|numeric',
        ];
    }
    
    /**
     * @return \App\Services\Dto\Room\CreateRoomDto
     */
    public function getDto(): CreateRoomDto
    {
        
        return new CreateRoomDto(
            Name::create($this->get('name')),
            Color::create($this->get('color')),
            Sale::create($this->boolean('is_sale')),
            $this->file('photo'),
            Uuid::fromString($this->get('plan_id')),
            Coordinate::create($this->get('coordinate')),
            Area::create($this->get('area'))
        );
    }
    
}
