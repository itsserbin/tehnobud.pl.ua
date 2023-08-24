<?php

namespace App\Services\Seo\Contract;

use App\Services\Dto\SeoDto;

/**
 * Interface Seo
 *
 * @package App\Services\Seo\Contract
 */
interface Seo {

    /**
     * @param \App\Services\Dto\SeoDto $dto
     */
    public function create(SeoDto $dto): void;
}
