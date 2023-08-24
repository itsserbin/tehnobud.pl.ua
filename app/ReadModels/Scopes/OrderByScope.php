<?php

namespace App\ReadModels\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait OrderByScope
{
    
    public function scopeOrderByField(
        Builder $builder,
        ?string $orderBy = null,
        ?string $order_direction = 'ASC',
    ) {
        if ( ! $order_direction)
        {
            $order_direction = 'ASC';
        }
        
        return $builder
            ->when(
                $orderBy === 'name',
                fn(Builder $builder) => $builder
                    ->orderBy(
                        'name->ru',
                        $order_direction
                    )
            )
            ->when(
                ($orderBy !== 'name' && $orderBy !== null),
                fn(Builder $builder) => $builder
                    ->orderBy(
                        $orderBy,
                        $order_direction
                    )
            );
    }
    
}