<?php

namespace App\ReadModels;

use App\ReadModels\Scopes\FilterByBuildingId;
use App\ReadModels\Scopes\FilterByName;
use App\ReadModels\Scopes\OrderByScope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Spatie\Translatable\HasTranslations;

/**
 * @mixin IdeHelperPlan
 */
class Plan extends ReadModel
{
    
    use HasTranslations, FilterByBuildingId, FilterByName, OrderByScope;
    
    /**
     * @var array|string[]
     */
    public array $translatable
        = [
            'name',
        ];
    
    
    protected $hidden
        = [
            'path',
        ];
    
    
    protected $appends
        = [
            'plan',
        ];
    
    
    /**
     * @return string
     */
    public function getPlanAttribute(): string
    {
        return URL::to('/') . Storage::url(
                $this->path
            );
    }
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class)->orderBy('number_room');
    }
}