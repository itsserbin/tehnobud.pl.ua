<?php

namespace App\ReadModels;

use App\ReadModels\Scopes\OrderByScope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

/**
 * @mixin IdeHelperSlider
 */
class Slider extends ReadModel
{
    
    use OrderByScope;
    
    /**
     * @var string[]
     */
    protected $appends = [
        'url',
    ];
    
    
    /**
     * @var string[]
     */
    protected $hidden = [
        'path',
    ];
    
    
    /**
     * @return string|null
     */
    public function getUrlAttribute(): ?string
    {
        if ( ! $this->path)
        {
            return null;
        }
        
        return URL::to('/') . Storage::url(
                $this->path
            );
    }
    
    
    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }
    
}