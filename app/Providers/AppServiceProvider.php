<?php

namespace App\Providers;

use App\Infrastructure\DoctrineStrictObjectManager;
use App\Infrastructure\Photo\Storage\Contracts\Storage;
use App\Infrastructure\Photo\Storage\FileStorage;
use App\Infrastructure\StrictObjectManager;
use App\Services\Forms\Contract\SendForms;
use App\Services\Forms\Email\SendFormToEmail;
use App\Services\Seo\Contract\Seo;
use App\Services\Seo\SeoService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void {

        $this->app->bind(
            StrictObjectManager::class,
            DoctrineStrictObjectManager::class
        );

        $this->app->bind(
            Storage::class,
            FileStorage::class
        );

        $this->app->bind(SendForms::class, SendFormToEmail::class);

        $this->app->bind(Seo::class, SeoService::class);
    }

}
