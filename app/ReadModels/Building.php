<?php

namespace App\ReadModels;

use App\ReadModels\Scopes\FilterByName;
use App\ReadModels\Scopes\OrderByScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Translatable\HasTranslations;

/**
 * Class Building
 *
 * @package App\ReadModels
 * @mixin IdeHelperBuilding
 */
class Building extends ReadModel
{
    
    use HasTranslations, FilterByName, HasFactory, OrderByScope, HasFactory;
    
    /**
     * @var array|string[]
     */
    public array $translatable
        = [
            'name',
            'slug',
            'address',
            'status',
            'description',
            'heating',
            'overlapping',
            'material',
            'view',
            'additional_information',
        ];
    
    /**
     * @var string[]
     */
    protected $casts
        = [
            'coordinate'             => 'array',
            'floors'                 => 'integer',
            'total_area'             => 'float',
            'parking'                => 'boolean',
            'started_at'             => 'date',
            'ended_at'               => 'date',
            'additional_information' => 'array',
        ];
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district(): BelongsTo
    {
        
        return $this->belongsTo(District::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function presentation(): HasOne
    {
        
        return $this->hasOne(Presentation::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sliders(): HasMany
    {
        
        return $this->hasMany(Slider::class);
    }
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function liveBlogs(): HasMany
    {
        
        return $this->hasMany(LiveBlog::class);
    }
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plans(): HasMany
    {
        
        return $this->hasMany(Plan::class)->orderBy('priority');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mainPhoto(): HasOne
    {
        
        return $this->hasOne(Slider::class)->orderBy('priority');
    }
    
    /**
     * @return string
     */
    public function getPriceFormatAttribute(): string
    {
        
        return number_format($this->price, 0, ",", " ");
    }
}
