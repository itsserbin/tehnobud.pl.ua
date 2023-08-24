<?php

namespace App\Queries\Presentation\Contract;

use App\ReadModels\Presentation;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Ramsey\Uuid\UuidInterface;

/**
 * Interface PresentationQuery
 *
 * @package App\Queries\Presentation\Contract
 */
interface PresentationQuery
{
    
    /**
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator;
    
    /**
     * @param   \Ramsey\Uuid\UuidInterface  $id
     *
     * @return \App\ReadModels\Presentation
     */
    public function getOne(UuidInterface $id): Presentation;
    
}