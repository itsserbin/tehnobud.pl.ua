<?php

namespace App\Services\Dto;

/**
 * Class SeoDto
 *
 * @package App\Services\Dto
 */
class SeoDto {

    /**
     * SeoDto constructor.
     *
     * @param string      $title
     * @param string      $description
     * @param string|null $imageUrl
     */
    public function __construct(
        private string $title,
        private string $description,
        private ?string $imageUrl = null,
    ) {
    }

    /**
     * @return string
     */
    public function getTitle(): string {

        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string {

        return $this->description;
    }

    /**
     * @return string|null
     */
    public function getImageUrl(): ?string {

        return $this->imageUrl;
    }
}
