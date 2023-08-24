<?php

namespace App\Http\Requests\Api\Admin\Building;

use App\Domain\ValueObject\Building\AdditionalInformation;
use App\Domain\ValueObject\Building\Coordinate;
use App\Domain\ValueObject\Building\DateRange;
use App\Domain\ValueObject\Building\Info;
use App\Domain\ValueObject\Building\Status;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Slug;
use App\Rules\HexColorRule;
use App\Services\Dto\Building\UpdateBuildingDto;
use DateTimeImmutable;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;

/**
 * Class UpdateBuildingRequest
 *
 * @package App\Http\Requests\Api\Admin\Building
 */
class UpdateBuildingRequest extends FormRequest {
    
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
    public function rules(): array
    {
        
        return [
            'district_id'            => [
                'required',
                'uuid',
                Rule::exists(
                    'districts',
                    'id'
                ),
            ],
            'name'                   => 'required|array',
            'name.ru'                => 'required|string',
            'name.ua'                => 'required|string',
            'address'                => 'required|array',
            'address.ru'             => 'required|string',
            'address.ua'             => 'required|string',
            'status'                 => 'required|array',
            'status.ru'              => 'nullable|string',
            'status.ua'              => 'nullable|string',
            'status_color'           => [
                'nullable',
                new HexColorRule(),
            ],
            'description'            => 'required|array',
            'description.ru'         => 'required|string',
            'description.ua'         => 'required|string',
            'coordinate'             => 'required|array',
            'coordinate.lat'         => 'required|numeric',
            'coordinate.lon'         => 'required|numeric',
            'is_active'              => 'required|boolean',
            'price'                  => 'nullable|numeric',
            'priority'               => 'required|integer',
            'floors'                 => 'nullable|integer',
            'total_area'             => 'nullable|numeric',
            'heating'                => 'nullable|array',
            'heating.ru'             => 'nullable|string',
            'heating.ua'             => 'nullable|string',
            'overlapping'            => 'nullable|array',
            'overlapping.ru'         => 'nullable|string',
            'overlapping.ua'         => 'nullable|string',
            'material'               => 'nullable|array',
            'material.ru'            => 'nullable|string',
            'material.ua'            => 'nullable|string',
            'view'                   => 'nullable|array',
            'view.ru'                => 'nullable|string',
            'view.ua'                => 'nullable|string',
            'parking'                => 'required|boolean',
            'started_at'             => 'nullable|date',
            'ended_at'               => 'nullable|date',
            'additional_information' => 'nullable|array',
        ];
    }
    
    /**
     * @return \App\Services\Dto\Building\UpdateBuildingDto
     * @throws \Exception
     */
    public function getDto(): UpdateBuildingDto
    {
        
        return new UpdateBuildingDto(
            Uuid::fromString($this->get('district_id')),
            Info::create(
                $this->get('address'),
                $this->get('description'),
                $this->get('price') ?  (float)$this->get('price') : null,
                (bool)$this->get('is_active'),
                (int)$this->get('priority'),
            ),
            Status::create(
                $this->get('status'),
                $this->get('status_color')
            ),
            Name::create($this->get('name')),
            Coordinate::create(
                (float)$this->get('coordinate')['lat'],
                (float)$this->get('coordinate')['lon']
            ),
            Slug::create($this->get('name')),
            AdditionalInformation::create(
                (int)$this->get('floors'),
                (double)$this->get('total_area'),
                $this->get('heating'),
                $this->get('overlapping'),
                $this->get('material'),
                $this->get('view'),
                (bool)$this->get('parking'),
                $this->get('additional_information')
            
            ),
            DateRange::create(
                $this->get('started_at') ? new DateTimeImmutable($this->get('started_at')) : null,
                $this->get('ended_at') ? new DateTimeImmutable($this->get('ended_at')) : null,
            ),
        );
    }
    
}
