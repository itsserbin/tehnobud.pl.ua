<?php


namespace App\Queries\District\Contract;


use App\ReadModels\District;
use App\Services\Dto\District\SearchDistrictDto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Ramsey\Uuid\UuidInterface;

/**
 * Interface CityQuery
 *
 * @package App\Queries\City\Contract
 */
interface DistrictQuery
{
    
    /**
     * @param \App\Services\Dto\District\SearchDistrictDto $dto
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll(SearchDistrictDto $dto): LengthAwarePaginator;
    
    /**
     * @param \Ramsey\Uuid\UuidInterface $id
     *
     * @return \App\ReadModels\District
     */
    public function getById(UuidInterface $id): District;
    
    /**
     * @param \Ramsey\Uuid\UuidInterface $city_id
     *
     * @return \Illuminate\Support\Collection
     */
    public function getByCityId(UuidInterface $city_id): Collection;
    
}