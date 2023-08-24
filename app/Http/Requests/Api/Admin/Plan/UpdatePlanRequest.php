<?php

namespace App\Http\Requests\Api\Admin\Plan;

use App\Domain\ValueObject\Building\Priority;
use App\Domain\ValueObject\Name;
use App\Services\Dto\Plan\UpdatePlanDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;
use Ramsey\Uuid\Uuid;

class UpdatePlanRequest extends FormRequest {
    
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
        'name'        => "string",
        'name.ru'     => "string",
        'name.ua'     => "string",
        'building_id' => "array",
        "priority"    => "string",
        "plan"        => "string",
    ])]
    public function rules(): array
    {
        
        return [
            'name'        => 'required|array',
            'name.ru'     => 'required|string',
            'name.ua'     => 'required|string',
            'building_id' => [
                'required',
                'uuid',
                Rule::exists(
                    'buildings',
                    'id'
                ),
            ],
            'priority'    => 'nullable|integer',
            'plan'        => 'nullable|image',
        ];
    }
    
    /**
     * @return \App\Services\Dto\Plan\UpdatePlanDto
     */
    public function getDto(): UpdatePlanDto
    {
        
        return new UpdatePlanDto(
            Name::create($this->get('name')),
            Uuid::fromString($this->get('building_id')),
            Priority::create($this->get('priority', 1)),
            $this->file('plan')
        );
    }
    
}
