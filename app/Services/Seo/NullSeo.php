<?php

namespace App\Services\Seo;

use App\Services\Dto\SeoDto;
use App\Services\Seo\Contract\Seo;

class NullSeo implements Seo {

    public function create(SeoDto $dto): void {
    }

}
