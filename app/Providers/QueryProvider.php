<?php

namespace App\Providers;

use App\Queries\Building\Contract\BuildingQuery;
use App\Queries\Building\EloquentBuildingQuery;
use App\Queries\City\Contract\CityQuery;
use App\Queries\City\EloquentCityQuery;
use App\Queries\District\Contract\DistrictQuery;
use App\Queries\District\EloquentDistrictQuery;
use App\Queries\LiveBlog\Contract\LiveBlogQuery;
use App\Queries\LiveBlog\EloquentLiveBlogQuery;
use App\Queries\Plan\Contract\PlanQuery;
use App\Queries\Plan\EloquentPlanQuery;
use App\Queries\Presentation\Contract\PresentationQuery;
use App\Queries\Presentation\EloquentPresentationQuery;
use App\Queries\Room\Contract\RoomQuery;
use App\Queries\Room\EloquentRoomQuery;
use App\Queries\Slider\Contract\SliderQuery;
use App\Queries\Slider\EloquentSliderQuery;
use Illuminate\Support\ServiceProvider;

class QueryProvider extends ServiceProvider
{
    
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
    }
    
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->app->bind(
            CityQuery::class,
            EloquentCityQuery::class
        );
        
        $this->app->bind(
            DistrictQuery::class,
            EloquentDistrictQuery::class
        );
        
        $this->app->bind(
            BuildingQuery::class,
            EloquentBuildingQuery::class
        );
        
        $this->app->bind(
            SliderQuery::class,
            EloquentSliderQuery::class
        );
        
        $this->app->bind(
            PresentationQuery::class,
            EloquentPresentationQuery::class
        );
        
        $this->app->bind(
            PlanQuery::class,
            EloquentPlanQuery::class
        );
        
        $this->app->bind(
            RoomQuery::class,
            EloquentRoomQuery::class
        );
        
        $this->app->bind(
            LiveBlogQuery::class,
            EloquentLiveBlogQuery::class
        );
    }
    
}
