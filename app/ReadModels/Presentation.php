<?php

namespace App\ReadModels;

use App\ReadModels\Scopes\FilterByBuildingId;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

/**
 * Class Presentation
 *
 * @package App\ReadModels
 * @mixin IdeHelperPresentation
 */
class Presentation extends ReadModel
{
    
    use FilterByBuildingId;
    
    protected $appends = [
        'pdf',
        'photo',
    ];
    
    
    protected $hidden = [
        'path',
        'path_pdf',
    ];
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }
    
    public function getPdfAttribute(): string
    {
        return URL::to('/') . Storage::url(
                $this->path_pdf
            );
    }
    
    public function getPhotoAttribute(): string
    {
        return URL::to('/') . Storage::url(
                $this->path
            );
    }
    
}