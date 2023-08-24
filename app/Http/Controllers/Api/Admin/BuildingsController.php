<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Building\CreateBuildingRequest;
use App\Http\Requests\Api\Admin\DeleteMassRequest;
use App\Http\Requests\Api\Admin\Building\UpdateBuildingRequest;
use App\Http\Requests\BuildingFilterRequest;
use App\Queries\Building\Contract\BuildingQuery;
use App\ReadModels\Building;
use App\Services\Building\BuildingServices;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Ramsey\Uuid\Uuid;

/**
 * Class BuildingsController
 *
 * @package App\Http\Controllers\Api\Admin
 */
final class BuildingsController extends Controller
{
    
    /**
     * @var \App\Queries\Building\Contract\BuildingQuery
     */
    private BuildingQuery $buildingQuery;
    
    
    /**
     * @var \App\Services\Building\BuildingServices
     */
    private BuildingServices $buildingService;
    
    
    /**
     * BuildingsController constructor.
     *
     * @param \App\Queries\Building\Contract\BuildingQuery $buildingQuery
     * @param \App\Services\Building\BuildingServices      $buildingService
     */
    public function __construct(
        BuildingQuery $buildingQuery,
        BuildingServices $buildingService
    )
    {
        $this->buildingQuery   = $buildingQuery;
        $this->buildingService = $buildingService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Requests\BuildingFilterRequest $request
     *
     * @return LengthAwarePaginator
     */
    public function index(BuildingFilterRequest $request): LengthAwarePaginator
    {
        return $this->buildingQuery->getAll($request->getDto());
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Api\Admin\Building\CreateBuildingRequest $request
     *
     * @return \App\Domain\Entities\Building
     * @throws \Exception
     */
    public function store(
        CreateBuildingRequest $request
    ): \App\Domain\Entities\Building
    {
        return $this->buildingService->create(
            Uuid::uuid4(),
            $request->getDto()
        );
    }
    
    /**
     * Display the specified resource.
     *
     * @param string $id
     *
     * @return \App\ReadModels\Building
     */
    public function show(string $id): Building
    {
        return $this->buildingQuery->getById(Uuid::fromString($id));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Api\Admin\Building\UpdateBuildingRequest $request
     * @param string                                                      $id
     *
     * @return \App\Domain\Entities\Building
     * @throws \Exception
     */
    public function update(
        UpdateBuildingRequest $request,
        string $id
    ): \App\Domain\Entities\Building
    {
        return $this->buildingService->update(
            Uuid::fromString($id),
            $request->getDto()
        );
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     *
     * @return \App\Domain\Entities\Building
     */
    public function destroy(string $id): \App\Domain\Entities\Building
    {
        return $this->buildingService->delete(Uuid::fromString($id));
    }
    
    
    /**
     * @param \App\Http\Requests\Api\Admin\DeleteMassRequest $request
     *
     * @return array
     */
    public function destroyMass(DeleteMassRequest $request): array
    {
        return $this->buildingService->destroyMass($request->getDto());
    }
}
