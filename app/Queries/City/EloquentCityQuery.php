<?php


namespace App\Queries\City;


use App\Exceptions\City\CityNotFoundException;
use App\Queries\City\Contract\CityQuery;
use App\ReadModels\City;
use App\Services\Dto\City\SearchCityDto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Ramsey\Uuid\UuidInterface;

/**
 * Class EloquentCityQuery
 *
 * @package App\Queries\City
 */
final class EloquentCityQuery implements CityQuery
{
    
    /**
     * @param \App\Services\Dto\City\SearchCityDto $dto
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll(SearchCityDto $dto): LengthAwarePaginator
    {
        return City::filterName($dto->getName())
                   ->when(
                       $dto->checkOrderByName(),
                       fn(Builder $builder) => $builder
                           ->orderBy(
                               'name->ru',
                               $dto->getOrderDirection()
                           )
                   )
                   ->when(
                       $dto->checkOrder(),
                       fn(Builder $builder) => $builder
                           ->orderBy(
                               $dto->getOrderBy(),
                               $dto->getOrderDirection()
                           )
                   )
                   ->paginate(
                       perPage: $dto->getPerPage()
                   );
    }
    
    /**
     * @param \Ramsey\Uuid\UuidInterface $id
     *
     * @return \App\ReadModels\City
     */
    public function getById(UuidInterface $id): City
    {
        $city = City::where('id', $id)->first();
        
        if ( ! $city)
        {
            throw new CityNotFoundException("City {$id->toString()} not found");
        }
        
        return $city;
    }
    
    /**
     * @return \Illuminate\Support\Collection
     */
    public function getSelect(): Collection
    {
        return City::pluck('name', 'id');
    }
}