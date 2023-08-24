<?php


namespace App\ReadModels;


use App\ReadModels\Scopes\FilterByName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

/**
 * @mixin IdeHelperCity
 */
final class City extends ReadModel
{

    use HasTranslations, FilterByName, HasFactory;

    public $translatable = ['name', 'slug'];

    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }
}