<?php

namespace App\Http\Requests\Api\Admin;

use App\Services\Dto\DeleteMassDto;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;
use Ramsey\Uuid\Uuid;

class DeleteMassRequest extends FormRequest
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
        'ids'   => "string",
        'ids.*' => "string",
    ])]
    public function rules(): array
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'required|uuid',
        ];
    }
    
    public function getDto(): DeleteMassDto
    {
        return new DeleteMassDto(
            collect($this->get('ids', []))
                ->map(fn(string $value) => Uuid::fromString($value))
                ->toArray()
        );
    }
}
