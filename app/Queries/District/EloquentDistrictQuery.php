<?php


namespace App\Queries\District;


use App\Exceptions\Districts\DistrictNotFoundException;
use App\Queries\District\Contract\DistrictQuery;
use App\ReadModels\District;
use App\Services\Dto\District\SearchDistrictDto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Ramsey\Uuid\UuidInterface;

/**
 * Class EloquentDistrictQuery
 *
 * @package App\Queries\District
 */
final class EloquentDistrictQuery implements DistrictQuery
{
    
    /**
     * @param \App\Services\Dto\District\SearchDistrictDto $dto
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll(SearchDistrictDto $dto): LengthAwarePaginator
    {
        return District::filterName($dto->getName())
                       ->orderByField(
                           $dto->getOrderBy(),
                           $dto->getOrderDirection()
                       )
                       ->with('city')
                       ->paginate($dto->getPerPage());
    }
    
    /**
     * @param \Ramsey\Uuid\UuidInterface $id
     *
     * @return \App\ReadModels\District
     */
    public function getById(UuidInterface $id): District
    {
        $district = District::where('id', $id)
                            ->with('city')
                            ->first();
        
        if ( ! $district)
        {
            throw new DistrictNotFoundException("District $id not found");
        }
        
        return $district;
    }
    
    /**
     * @param \Ramsey\Uuid\UuidInterface $city_id
     *
     * @return \Illuminate\Support\Collection
     */
    public function getByCityId(UuidInterface $city_id): Collection
    {
        return District::select(['id', 'name'])->where('city_id', $city_id)->get()->map(
            fn(District $district) => [
                'id'   => $district->id,
                'name' => $district->name,
            ]
        );
    }
}