<?php

namespace App\ReadModels\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait FilterByName
{
    
    public function scopeFilterName(Builder $builder, ?string $name = null)
    {
        return $builder->when(
            $name,
            fn (Builder $builder) => $builder
                ->where(
                    function (Builder $q) use ($name) {
                        return $q
                            ->where('name->ru', 'LIKE', "%$name%")
                            ->orWhere('name->ua', 'LIKE', "%$name%");
                    }
                )
        );
    }
    
}