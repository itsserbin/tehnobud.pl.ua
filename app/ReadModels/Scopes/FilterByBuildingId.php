<?php

namespace App\ReadModels\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Ramsey\Uuid\UuidInterface;

trait FilterByBuildingId
{
    
    public function scopeFilterBuildingId(Builder $builder, ?UuidInterface $id = null)
    {
        return $builder->when(
            $id,
            fn (Builder $builder) => $builder
                ->where(
                    function (Builder $q) use ($id) {
                        return $q
                            ->where(
                                'building_id',
                                '=',
                                $id
                            );
                    }
                )
        );
    }
    
}