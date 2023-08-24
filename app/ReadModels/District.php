<?php

declare(strict_types=1);

namespace App\ReadModels;

use App\ReadModels\Scopes\FilterByName;
use App\ReadModels\Scopes\OrderByScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

/**
 * @mixin IdeHelperDistrict
 */
final class District extends ReadModel
{
    
    use HasTranslations, FilterByName, OrderByScope, HasFactory;
    
    /**
     * @var string[]
     */
    public $translatable = ['name', 'slug'];
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
    
    
    public function building(): HasMany
    {
        return $this->hasMany(Building::class);
    }
    
}