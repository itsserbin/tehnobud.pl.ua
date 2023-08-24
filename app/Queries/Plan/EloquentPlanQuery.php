<?php

declare(strict_types=1);

namespace App\Queries\Plan;

use App\Exceptions\Plan\PlanNotFoundException;
use App\Queries\Plan\Contract\PlanQuery;
use App\ReadModels\Plan;
use App\Services\Dto\Plan\SearchPlanDto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Ramsey\Uuid\UuidInterface;

/**
 * Class EloquentPlanQuery
 *
 * @package App\Queries\Plan
 */
final class EloquentPlanQuery implements PlanQuery
{
    
    /**
     * @param   \App\Services\Dto\Plan\SearchPlanDto  $dto
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll(SearchPlanDto $dto): LengthAwarePaginator
    {
        return Plan::filterBuildingId($dto->getBuildingId())
            ->filterName($dto->getName())
            ->orderByField($dto->getOrderBy(), $dto->getOrderDirection())
            ->with('building')
            ->paginate($dto->getPerPage());
    }
    
    /**
     * @param   \Ramsey\Uuid\UuidInterface  $id
     *
     * @return \App\ReadModels\Plan
     */
    public function getOne(UuidInterface $id): Plan
    {
        $plan = Plan::where(
            'id',
            $id
        )
            ->with('building')
            ->first();
        
        if ( ! $plan)
        {
            throw new PlanNotFoundException("Plan $id not found");
        }
        
        return $plan;
    }
    
}