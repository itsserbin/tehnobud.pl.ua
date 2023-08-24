<?php

namespace App\Http\Controllers\Site;

use App;
use App\Http\Controllers\Controller;
use App\Queries\LiveBlog\Contract\LiveBlogQuery;
use App\Services\Dto\SeoDto;
use App\Services\Seo\Contract\Seo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class NewsController extends Controller {

    public function __construct(
        private LiveBlogQuery $liveBlogQuery,
        private Seo $seoService
    ) {
    }

    /**
     * @param string $slug_building
     * @param string $slug_new
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
     */
    public function getBySlug(string $slug_building, string $slug_new): Factory|View|Application {

        /* @var \App\ReadModels\LiveBlog $blog */
        $blog = $this->liveBlogQuery->getBySlug($slug_building, $slug_new, App::getLocale());

        $this->seoService->create(
            new SeoDto(
                $blog->getTranslation('name', App::getLocale()),
                $blog->getTranslation('description', App::getLocale()),
                $blog->images->first()->media ?? null
            )
        );

        $url = match (App::getLocale()) {
            'ua' => 'ru/' . $blog->getTranslation('slug', 'ru'),
            'ru' => $blog->getTranslation('slug', 'ua')
        };

        return view(
            'news.news',
            [
                'blogs' => $this->liveBlogQuery->getBySlug($slug_building, $slug_new, App::getLocale()),
                'url'   => $url,
            ]
        );
    }
}
