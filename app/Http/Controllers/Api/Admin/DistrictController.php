<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\DeleteMassRequest;
use App\Http\Requests\Api\Admin\District\CreateDistrictRequest;
use App\Http\Requests\Api\Admin\District\UpdateDistrictRequest;
use App\Http\Requests\DistrictFilterRequest;
use App\Queries\District\Contract\DistrictQuery;
use App\ReadModels\District;
use App\Services\District\DistrictService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Ramsey\Uuid\Uuid;

/**
 * Class DistrictController
 *
 * @package App\Http\Controllers\Api\Admin
 */
class DistrictController extends Controller
{

    /**
     * @var \App\Queries\District\Contract\DistrictQuery
     */
    private DistrictQuery $districtQuery;
    /**
     * @var \App\Services\District\DistrictService
     */
    private DistrictService $districtService;

    /**
     * DistrictController constructor.
     *
     * @param  \App\Queries\District\Contract\DistrictQuery  $districtQuery
     * @param  \App\Services\District\DistrictService  $districtService
     */
    public function __construct(
        DistrictQuery $districtQuery,
        DistrictService $districtService
    ) {
        $this->districtQuery   = $districtQuery;
        $this->districtService = $districtService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\DistrictFilterRequest  $request
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(DistrictFilterRequest $request): LengthAwarePaginator
    {
        return $this->districtQuery->getAll($request->getDto());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Api\Admin\District\CreateDistrictRequest  $request
     *
     * @return \App\Domain\Entities\District
     */
    public function store(CreateDistrictRequest $request
    ): \App\Domain\Entities\District {
        return $this->districtService->create($request->getDto());
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     *
     * @return \App\ReadModels\District
     */
    public function show(string $id): District
    {
        return $this->districtQuery->getById(Uuid::fromString($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Api\Admin\District\UpdateDistrictRequest  $request
     * @param  string  $id
     *
     * @return \App\Domain\Entities\District
     */
    public function update(
        UpdateDistrictRequest $request,
        string $id
    ): \App\Domain\Entities\District {
        return $this->districtService->update($request->getDto(),
            Uuid::fromString($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     *
     * @return \App\Domain\Entities\District
     */
    public function destroy(string $id): \App\Domain\Entities\District
    {
        return $this->districtService->destroy(Uuid::fromString($id));
    }

    
    public function deleteMass(DeleteMassRequest $request): array
    {
        return $this->districtService->deleteMass($request->getDto());
    }
}
