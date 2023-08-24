<?php

use App\Http\Controllers\Api\Admin\BuildingsController;
use App\Http\Controllers\Api\Admin\CityController;
use App\Http\Controllers\Api\Admin\DistrictController;
use App\Http\Controllers\Api\Admin\LiveBlogController;
use App\Http\Controllers\Api\Admin\LoginController;
use App\Http\Controllers\Api\Admin\PlanController;
use App\Http\Controllers\Api\Admin\PresentationController;
use App\Http\Controllers\Api\Admin\RoomController;
use App\Http\Controllers\Api\Admin\SliderController;
use App\Http\Controllers\Api\Site\DistrictController as DistrictSiteApiController;
use App\Http\Controllers\Api\Site\Forms\CallbackFormController;
use App\Http\Controllers\Api\Site\Forms\SubscribeController;
use App\Http\Controllers\Site\BuildingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(
    [
        'prefix'     => 'admin',
        'middleware' => [
            'auth:sanctum',
        ],
    ],
    function () {
        
        Route::group(
            ['prefix' => 'cities'],
            function () {
                
                Route::get(
                    '/',
                    [CityController::class, 'index']
                );
                Route::get(
                    '/{id}',
                    [CityController::class, 'getById']
                );
                Route::post(
                    '/',
                    [CityController::class, 'create']
                );
                Route::put(
                    '/{id}',
                    [CityController::class, 'update']
                );
                Route::delete(
                    '/{id}',
                    [CityController::class, 'delete']
                );
                
                Route::delete(
                    '/',
                    [CityController::class, 'deleteMass']
                );
            }
        );
        
        Route::apiResource(
            '/districts',
            DistrictController::class
        );
        
        Route::delete(
            '/districts',
            [DistrictController::class, 'deleteMass']
        );
        
        Route::apiResource(
            '/buildings',
            BuildingsController::class
        );
        
        Route::delete('/buildings', [BuildingsController::class, 'destroyMass']);
        
        Route::apiResource(
            '/sliders',
            SliderController::class
        )
             ->except(['update', 'store']);
        
        Route::post('/sliders/{building_id}', [SliderController::class, 'store']);
        
        Route::delete(
            '/sliders',
            [SliderController::class, 'deleteMass']
        );
        
        Route::post(
            '/sliders/{id}/update',
            [SliderController::class, 'updatePhoto']
        );
        
        Route::apiResource(
            '/presentations',
            PresentationController::class
        )
             ->except(['update']);
        
        Route::post(
            '/presentations/{id}/update',
            [PresentationController::class, 'update']
        );
        
        Route::delete(
            '/presentations',
            [PresentationController::class, 'deleteMass']
        );
        
        Route::apiResource(
            '/plans',
            PlanController::class
        )->except(['update']);
        
        Route::post(
            '/plans/{id}',
            [PlanController::class, 'update']
        );
        
        Route::delete(
            '/plans',
            [PlanController::class, 'deleteMass']
        );
        
        Route::apiResource(
            '/rooms',
            RoomController::class
        );
        
        Route::post(
            '/rooms/{id}',
            [RoomController::class, 'update']
        );
        
        Route::delete(
            '/rooms',
            [RoomController::class, 'deleteMass']
        );
        
        Route::apiResource(
            '/live-blogs',
            LiveBlogController::class
        )->except(['update']);
        
        Route::post('/live-blogs/{id}', [LiveBlogController::class, 'update']);
        
        Route::delete(
            '/live-blogs',
            [LiveBlogController::class, 'deleteMass']
        );
    }
);

Route::group(
    [
        'prefix' => 'admin',
    ],
    function () {
        
        Route::post(
            '/login',
            [LoginController::class, 'login']
        );
        Route::post(
            '/logout',
            [LoginController::class, 'logout']
        )
             ->middleware(['auth:sanctum']);
    }
);

Route::get('/buildings', [BuildingController::class, 'getByFilter']);
Route::get('/districts/{city_id}', [DistrictSiteApiController::class, 'getByCityId']);

Route::post('/forms/callback', [CallbackFormController::class, 'send']);

Route::post('/forms/subscribe', [SubscribeController::class, 'send']);
