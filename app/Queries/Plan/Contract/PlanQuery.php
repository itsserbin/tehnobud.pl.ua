<?php

declare(strict_types=1);

namespace App\Queries\Plan\Contract;

use App\ReadModels\Plan;
use App\Services\Dto\Plan\SearchPlanDto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Ramsey\Uuid\UuidInterface;

/**
 * Interface PlanQuery
 *
 * @package App\Queries\Plan\Contract
 */
interface PlanQuery
{
    
    /**
     * @param   \App\Services\Dto\Plan\SearchPlanDto  $dto
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll(SearchPlanDto $dto): LengthAwarePaginator;
    
    /**
     * @param   \Ramsey\Uuid\UuidInterface  $id
     *
     * @return \App\ReadModels\Plan
     */
    public function getOne(UuidInterface $id): Plan;
    
}