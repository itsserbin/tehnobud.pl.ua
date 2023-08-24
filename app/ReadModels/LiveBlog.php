<?php

namespace App\ReadModels;

use App\ReadModels\Scopes\FilterByBuildingId;
use App\ReadModels\Scopes\FilterByName;
use App\ReadModels\Scopes\OrderByScope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

/**
 * @mixin IdeHelperLiveBlog
 */
class LiveBlog extends ReadModel
{
    
    use HasTranslations, FilterByBuildingId, FilterByName, OrderByScope;
    
    /**
     * @var array|string[]
     */
    public array $translatable
        = [
            'name',
            'description',
            'slug',
        ];
    
    
    protected $casts
        = [
            'videos'       => 'array',
            'published_at' => 'datetime',
        ];
    
    
    public function images(): HasMany
    {
        return $this->hasMany(LiveBlogMedia::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }
    
}