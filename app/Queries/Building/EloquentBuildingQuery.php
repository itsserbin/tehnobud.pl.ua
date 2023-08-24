<?php

namespace App\Queries\Building;

use App\Exceptions\Building\BuildingNotFoundException;
use App\Queries\Building\Contract\BuildingQuery;
use App\ReadModels\Building;
use App\Services\Dto\Building\SearchBuildingDto;
use App\Services\Localization\LocalizationHandle;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\ExpectedValues;
use Ramsey\Uuid\UuidInterface;

/**
 * Class EloquentBuildingQuery
 *
 * @package App\Queries\Building
 */
class EloquentBuildingQuery implements BuildingQuery
{
    
    /**
     * @inheritDoc
     */
    public function getAll(SearchBuildingDto $dto): LengthAwarePaginator
    {
        
        return Building::filterName($dto->getName())
                       ->orderByField(
                           $dto->getOrderBy(),
                           $dto->getOrderDirection()
                       )
                       ->with(
                           [
                               'district',
                               'district.city',
                               'presentation',
                               'sliders',
                           ]
                       )
                       ->paginate($dto->getPerPage());
    }
    
    /**
     * @inheritDoc
     */
    public function getById(UuidInterface $id): Building
    {
        
        $building = Building::where('id', $id)
                            ->with(
                                [
                                    'district',
                                    'district.city',
                                    'presentation',
                                    'sliders',
                                ]
                            )
                            ->first();
        
        if ( ! $building){
            throw new BuildingNotFoundException("Building {$id} not found");
        }
        
        return $building;
    }
    
    /**
     * @param \App\Services\Dto\Building\SearchBuildingDto $dto
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllToSite(SearchBuildingDto $dto): LengthAwarePaginator
    {
        
        return Building::filterName($dto->getName())
                       ->with(['presentation'])
                       ->when(
                           $dto->getDistrictId(),
                           fn(Builder $q) => $q
                               ->where('district_id', $dto->getDistrictId())
                       )
                       ->when(
                           $dto->getCityId(),
                           fn(Builder $q) => $q->whereHas(
                               'district',
                               fn(Builder $builder) => $builder
                                   ->where('city_id', $dto->getCityId())
                           )
                       )
                       ->where('is_active', true)
                       ->orderByDesc('priority')
                       ->paginate(6);
    }
    
    /**
     * @param string $slug
     * @param string $lang
     *
     * @return \App\ReadModels\Building
     */
    public function getBySlug(string $slug, #[ExpectedValues(LocalizationHandle::LANGUAGES)] string $lang): Building
    {
        
        return Building::where("slug->$lang", $slug)
                       ->with(
                           [
                               'district',
                               'district.city',
                               'sliders',
                               'liveBlogs',
                               'presentation',
                               'plans',
                               'plans.rooms',
                           ]
                       )
                       ->firstOrFail();
    }
}
