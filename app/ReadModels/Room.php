<?php

namespace App\ReadModels;

use App\ReadModels\Scopes\FilterByName;
use App\ReadModels\Scopes\OrderByScope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Spatie\Translatable\HasTranslations;

/**
 * @mixin IdeHelperRoom
 */
class Room extends ReadModel
{
    
    use HasTranslations, FilterByName, OrderByScope;
    
    /**
     * @var string[]
     */
    public array $translatable = [
        'name',
    ];
    
    
    /**
     * @var string[]
     */
    protected $hidden = [
        'path',
    ];
    
    
    /**
     * @var string[]
     */
    protected $appends = [
        'photo',
    ];
    
    
    /**
     * @return string
     */
    public function getPhotoAttribute(): string
    {
        return URL::to('/') . Storage::url(
                $this->path
            );
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }
    
}