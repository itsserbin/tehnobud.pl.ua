<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Queries\Building\Contract\BuildingQuery;
use App\Queries\City\Contract\CityQuery;
use App\Services\Dto\Building\SearchBuildingDto;
use App\Services\Dto\SeoDto;
use App\Services\Seo\Contract\Seo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class IndexController extends Controller {

    public function __construct(
        private BuildingQuery $buildingQuery,
        private CityQuery $cityQuery,
        private Seo $seoService
    ) {
    }

    public function index(): Factory|View|Application {

        $this->seoService->create(
            new SeoDto(
                __('seo.index'),
                '',
                asset('assets/images/img/Subtract.png')
            )
        );

        return view(
            'index',
            [
                'buildings'    => $this->buildingQuery->getAllToSite(new SearchBuildingDto),
                'citiesSelect' => $this->cityQuery->getSelect(),
            ]
        );
    }

}
