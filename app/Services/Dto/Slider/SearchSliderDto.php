<?php

namespace App\Services\Dto\Slider;

use Ramsey\Uuid\UuidInterface;

/**
 * Class SearchSliderDto
 *
 * @package App\Services\Dto\Slider
 */
final class SearchSliderDto
{
    
    /**
     * SearchSliderDto constructor.
     *
     * @param   \Ramsey\Uuid\UuidInterface|null  $building_id
     * @param   string|null  $orderBy
     * @param   string|null  $orderDirection
     * @param   int|null  $perPage
     */
    public function __construct(
        private ?UuidInterface $building_id,
        private ?string $orderBy,
        private ?string $orderDirection,
        private ?int $perPage
    ) {
    }
    
    /**
     * @return int|null
     */
    public function getPerPage(): ?int
    {
        return $this->perPage;
    }
    
    /**
     * @return \Ramsey\Uuid\UuidInterface|null
     */
    public function getBuildingId(): ?UuidInterface
    {
        return $this->building_id;
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
    
}