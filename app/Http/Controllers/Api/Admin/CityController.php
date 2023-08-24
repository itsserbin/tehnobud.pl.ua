<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\City\CreateCityRequest;
use App\Http\Requests\Api\Admin\City\UpdateCityRequest;
use App\Http\Requests\Api\Admin\DeleteMassRequest;
use App\Http\Requests\CityFilterRequest;
use App\Queries\City\Contract\CityQuery;
use App\ReadModels\City;
use App\Services\City\CityServices;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Ramsey\Uuid\Uuid;

/**
 * Class CityController
 *
 * @package App\Http\Controllers\Api\Admin
 */
final class CityController extends Controller
{
    
    /**
     * @var \App\Queries\City\Contract\CityQuery
     */
    private CityQuery $cityQuery;
    
    /**
     * @var \App\Services\City\CityServices
     */
    private CityServices $cityServices;
    
    /**
     * CityController constructor.
     *
     * @param \App\Queries\City\Contract\CityQuery $cityQuery
     * @param \App\Services\City\CityServices      $cityServices
     */
    public function __construct(
        CityQuery $cityQuery,
        CityServices $cityServices
    )
    {
        $this->cityQuery    = $cityQuery;
        $this->cityServices = $cityServices;
    }
    
    /**
     * @param \App\Http\Requests\CityFilterRequest $request
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(CityFilterRequest $request): LengthAwarePaginator
    {
        return $this->cityQuery
            ->getAll($request->getDto());
    }
    
    
    /**
     * @param string $id
     *
     * @return \App\ReadModels\City
     */
    public function getById(string $id): City
    {
        return $this->cityQuery->getById(Uuid::fromString($id));
    }
    
    
    /**
     * @param \App\Http\Requests\Api\Admin\City\CreateCityRequest $request
     *
     * @return \App\Domain\Entities\City
     */
    public function create(CreateCityRequest $request
    ): \App\Domain\Entities\City
    {
        return $this->cityServices->create($request->getDto());
    }
    
    /**
     * @param \App\Http\Requests\Api\Admin\City\UpdateCityRequest $request
     * @param string                                              $id
     *
     * @return \App\Domain\Entities\City
     */
    public function update(
        UpdateCityRequest $request,
        string $id
    ): \App\Domain\Entities\City
    {
        return $this->cityServices->update(
            Uuid::fromString($id),
            $request->getDto()
        );
    }
    
    /**
     * @param string $id
     *
     * @return \App\Domain\Entities\City
     */
    public function delete(string $id): \App\Domain\Entities\City
    {
        return $this->cityServices->delete(Uuid::fromString($id));
    }
    
    
    /**
     * @param \App\Http\Requests\Api\Admin\DeleteMassRequest $request
     *
     * @return array
     */
    public function deleteMass(DeleteMassRequest $request): array
    {
        return $this->cityServices->deleteMass($request->getDto());
    }
}
