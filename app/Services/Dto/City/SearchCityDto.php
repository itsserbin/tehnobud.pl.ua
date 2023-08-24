<?php

declare(strict_types=1);

namespace App\Services\Dto\City;

use JetBrains\PhpStorm\Immutable;
use JetBrains\PhpStorm\Pure;

/**
 * Class SearchCityDto
 *
 * @package App\Services\Dto\City
 */
#[Immutable]
final class SearchCityDto
{

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->per_page;
    }

    /**
     * SearchCityDto constructor.
     *
     * @param  ?string  $name
     * @param  string|null  $orderBy
     * @param  string|null  $orderDirection
     * @param  int  $per_page
     */
    public function __construct(
        private ?string $name = null,
        private ?string $orderBy = null,
        private ?string $orderDirection = 'ASC',
        private int $per_page = 20
    ) {
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getOrderBy(): ?string
    {
        return $this->orderBy;
    }

    /**
     * @return string|null
     */
    public function getOrderDirection(): ?string
    {
        return $this->orderDirection;
    }


    /**
     * @return bool
     */
    #[Pure]
    public function checkOrderByName(): bool
    {
        return $this->orderBy === 'name' && $this->getOrderDirection();
    }

    /**
     * @return bool
     */
    #[Pure]
    public function checkOrder(): bool
    {
        return $this->orderBy !== 'name' && $this->getOrderDirection();
    }

}