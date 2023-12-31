<?php

use App\Http\Controllers\Site\BuildingController;
use App\Http\Controllers\Site\IndexController;
use App\Http\Controllers\Site\NewsController;
use App\Http\Controllers\Site\StaticPageController;
use App\Services\Localization\LocalizationHandle;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
$locals = ['', ...LocalizationHandle::LANGUAGES];

foreach ($locals as $local) {
    Route::group(
        [
            'prefix' => $local,
        ],
        function () {

            Route::get('/', [IndexController::class, 'index'])
                ->name('index');

            Route::get('service', [StaticPageController::class, 'service'])
                ->name('service');

            Route::get('about-us', [StaticPageController::class, 'aboutUs'])
                ->name('about-us');

            Route::get('contact', [StaticPageController::class, 'contact'])
                ->name('contact');

            if (!Request::is('ru')) {
                Route::get('/{slug}', [BuildingController::class, 'getBySlug'])
                    ->name('building');

                Route::get('/{slug_building}/news/{slug_new}', [NewsController::class, 'getBySlug'])
                    ->name('news');
            }

        }
    );
}
