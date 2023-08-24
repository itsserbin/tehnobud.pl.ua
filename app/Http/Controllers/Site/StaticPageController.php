<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\Dto\SeoDto;
use App\Services\Seo\Contract\Seo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class StaticPageController extends Controller {

    public function __construct(
        private Seo $seo
    ) {
    }

    public function service(): Factory|View|Application {

       $this->seo->create(
            new SeoDto(
                __('home.menu.service'),
                '',
                asset('assets/images/icon/logo.png')
            )
        );

        return view('service.service');
    }

    public function aboutUs(): Factory|View|Application {

       $this->seo->create(
            new SeoDto(
                __('home.menu.about'),
                '',
                asset('assets/images/icon/logo.png')
            )
        );

        return view('about-us.about-us');
    }

    public function contact(): Factory|View|Application {

       $this->seo->create(
            new SeoDto(
                __('home.menu.contact'),
                '',
                asset('assets/images/icon/logo.png')
            )
        );

        return view('contact.contact');
    }
}
