<?php

namespace App\Queries\Presentation;

use App\Exceptions\Presentation\PresentationNotFoundException;
use App\Queries\Presentation\Contract\PresentationQuery;
use App\ReadModels\Presentation;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Ramsey\Uuid\UuidInterface;

/**
 * Class EloquentPresentationQuery
 *
 * @package App\Queries\Presentation
 */
class EloquentPresentationQuery implements PresentationQuery
{
    
    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator
    {
        return Presentation::with('building')
            ->paginate();
    }
    
    /**
     * @param   \Ramsey\Uuid\UuidInterface  $id
     *
     * @return \App\ReadModels\Presentation
     */
    public function getOne(UuidInterface $id): Presentation
    {
        $presentation = Presentation::where(
            'id',
            $id
        )
            ->with('building')
            ->first();
        
        if ( ! $presentation)
        {
            throw new PresentationNotFoundException(
                "Presentation $id not found"
            );
        }
        
        return $presentation;
    }
    
}