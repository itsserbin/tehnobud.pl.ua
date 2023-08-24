<?php

namespace App\Http\Controllers\Site;

use App;
use App\Http\Controllers\Controller;
use App\Http\Requests\BuildingFilterRequest;
use App\Queries\Building\Contract\BuildingQuery;
use App\Services\Dto\SeoDto;
use App\Services\Seo\Contract\Seo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class BuildingController extends Controller {

    public function __construct(
        private BuildingQuery $buildingQuery,
        private Seo $seoService
    ) {
    }

    /**
     * @param string $slug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
     */
    public function getBySlug(string $slug): Factory|View|Application {

        $building = $this->buildingQuery->getBySlug($slug, App::getLocale());
        $title    = $building->getTranslation('name', App::getLocale());
        $desc     = $building->getTranslation('description', App::getLocale());

        $this->seoService->create(
            new SeoDto(
                $title,
                $desc,
                $building->mainPhoto->url ?? null
            )
        );

        $url = match (App::getLocale()) {
            'ua' => 'ru/' . $building->getTranslation('slug', 'ru'),
            'ru' => $building->getTranslation('slug', 'ua')
        };

        return view(
            'object.object',
            [
                'building' => $building,
                'url'      => "/" . $url,
            ]
        );
    }


    public function getByFilter(BuildingFilterRequest $request): Factory|View|Application {

        return view(
            'home.api.buildings',
            [
                'buildings' => $this->buildingQuery->getAllToSite($request->getDto()),
            ]
        );
    }
}
