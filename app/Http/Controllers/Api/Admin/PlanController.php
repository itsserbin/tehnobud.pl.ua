<?php

namespace App\Http\Controllers\Api\Admin;

use App\Domain\Entities\Plan;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\DeleteMassRequest;
use App\Http\Requests\Api\Admin\Plan\CreatePlanRequest;
use App\Http\Requests\Api\Admin\Plan\UpdatePlanRequest;
use App\Http\Requests\Search\PlanFilterRequest;
use App\Queries\Plan\Contract\PlanQuery;
use App\Services\Plan\PlanServices;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Ramsey\Uuid\Uuid;

/**
 * Class PlanController
 *
 * @package App\Http\Controllers\Api\Admin
 */
class PlanController extends Controller {
    
    /**
     * PlanController constructor.
     *
     * @param \App\Services\Plan\PlanServices      $planServices
     * @param \App\Queries\Plan\Contract\PlanQuery $planQuery
     */
    public function __construct(
        private PlanServices $planServices,
        private PlanQuery $planQuery
    ) {
    }
    
    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Requests\Search\PlanFilterRequest $request
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(PlanFilterRequest $request): LengthAwarePaginator
    {
        
        return $this->planQuery->getAll($request->getDto());
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Api\Admin\Plan\CreatePlanRequest $request
     *
     * @return \App\Domain\Entities\Plan
     */
    public function store(CreatePlanRequest $request): Plan
    {
        
        return $this->planServices->create(
            Uuid::uuid4(),
            $request->getDto()
        );
    }
    
    /**
     * Display the specified resource.
     *
     * @param string $id
     *
     * @return \App\ReadModels\Plan
     */
    public function show(string $id): \App\ReadModels\Plan
    {
        
        return $this->planQuery->getOne(Uuid::fromString($id));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Api\Admin\Plan\UpdatePlanRequest $request
     * @param string                                              $id
     *
     * @return \App\Domain\Entities\Plan
     */
    public function update(
        UpdatePlanRequest $request,
        string $id
    ): Plan {
        
        return $this->planServices->update(
            Uuid::fromString($id),
            $request->getDto()
        );
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     *
     * @return \App\Domain\Entities\Plan
     */
    public function destroy(string $id): Plan
    {
        
        return $this->planServices->destroy(Uuid::fromString($id));
    }
    
    
    /**
     * @param \App\Http\Requests\Api\Admin\DeleteMassRequest $request
     *
     * @return array
     */
    public function deleteMass(DeleteMassRequest $request): array
    {
        
        return $this->planServices->deleteMass($request->getDto());
    }
    
}
