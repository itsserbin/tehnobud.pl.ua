<?php

namespace App\Queries\Slider;

use App\Exceptions\Slider\SliderNotFoundException;
use App\Queries\Slider\Contract\SliderQuery;
use App\ReadModels\Slider;
use App\Services\Dto\Slider\SearchSliderDto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Ramsey\Uuid\UuidInterface;

/**
 * Class EloquentSliderQuery
 *
 * @package App\Queries\Slider
 */
class EloquentSliderQuery implements SliderQuery
{
    
    /**
     * @param   \App\Services\Dto\Slider\SearchSliderDto  $dto
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll(SearchSliderDto $dto): LengthAwarePaginator
    {
        return Slider::orderByField(
            $dto->getOrderBy(),
            $dto->getOrderDirection()
        )
            ->when(
                $dto->getBuildingId(),
                fn(Builder $builder) => $builder->where(
                    'building_id',
                    $dto->getBuildingId()
                )
            )
            ->paginate($dto->getPerPage());
    }
    
    /**
     * @param   \Ramsey\Uuid\UuidInterface  $id
     *
     * @return \App\ReadModels\Slider
     */
    public function getOne(UuidInterface $id): Slider
    {
        $slider = Slider::where(
            'id',
            $id
        )
            ->with(
                [
                    'building',
                ]
            )
            ->first();
        
        if ( ! $slider)
        {
            throw new SliderNotFoundException("Photo {$id} not found");
        }
        
        return $slider;
    }
    
}