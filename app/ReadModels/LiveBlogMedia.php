<?php

namespace App\ReadModels;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

/**
 * @mixin IdeHelperLiveBlogMedia
 */
class LiveBlogMedia extends ReadModel
{
    
    protected $table = 'live_blogs_medias';
    
    
    protected $hidden = [
        'path',
    ];
    
    
    protected $appends = [
        'media',
    ];
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function LiveBlog(): BelongsTo
    {
        return $this->belongsTo(LiveBlog::class);
    }
    
    /**
     * @return string|null
     */
    public function getMediaAttribute(): ?string
    {
        if ( ! $this->path)
        {
            return null;
        }
        
        return URL::to('/') . Storage::url(
                $this->path
            );
    }
    
}