<?php

namespace App\Services\Seo;

use App\Services\Dto\SeoDto;
use App\Services\Seo\Contract\Seo;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;

/**
 * Class SeoService
 *
 * @package App\Services\Seo
 */
class SeoService implements Seo {

    /**
     * @param \App\Services\Dto\SeoDto $dto
     */
    public function create(SeoDto $dto): void {

        SEOMeta::setTitle($dto->getTitle());
        SEOMeta::setDescription($dto->getDescription());

        OpenGraph::setTitle($dto->getTitle());
        OpenGraph::setDescription($dto->getDescription());
        OpenGraph::addImage($dto->getImageUrl());
    }
}
