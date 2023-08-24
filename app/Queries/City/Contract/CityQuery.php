<?php


namespace App\Queries\City\Contract;


use App\ReadModels\City;
use App\Services\Dto\City\SearchCityDto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Ramsey\Uuid\UuidInterface;

/**
 * Interface CityQuery
 *
 * @package App\Queries\City\Contract
 */
interface CityQuery
{
    
    /**
     * @param \App\Services\Dto\City\SearchCityDto $dto
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll(SearchCityDto $dto): LengthAwarePaginator;
    
    /**
     * @param \Ramsey\Uuid\UuidInterface $id
     *
     * @return \App\ReadModels\City
     */
    public function getById(UuidInterface $id): City;
    
    
    /**
     * @return \Illuminate\Support\Collection
     */
    public function getSelect(): Collection;
}