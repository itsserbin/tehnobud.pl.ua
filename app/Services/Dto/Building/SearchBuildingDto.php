<?php

declare(strict_types=1);

namespace App\Services\Dto\Building;

use JetBrains\PhpStorm\Immutable;
use Ramsey\Uuid\UuidInterface;

/**
 * Class SearchBuildingDto
 *
 * @package App\Services\Dto\Building
 *
 * @psalm-immutable
 */
#[Immutable]
final class SearchBuildingDto
{
    
    /**
     * SearchBuildingDto constructor.
     *
     * @param string|null                     $name
     * @param string|null                     $orderBy
     * @param string|null                     $orderDirection
     * @param int|null                        $perPage
     * @param \Ramsey\Uuid\UuidInterface|null $district_id
     * @param \Ramsey\Uuid\UuidInterface|null $city_id
     */
    public function __construct(
        private ?string $name = null,
        private ?string $orderBy = null,
        private ?string $orderDirection = null,
        private ?int $perPage = null,
        private ?UuidInterface $district_id = null,
        private ?UuidInterface $city_id = null
    )
    {
    }
    
    /**
     * @return \Ramsey\Uuid\UuidInterface|null
     */
    public function getCityId(): ?UuidInterface
    {
        return $this->city_id;
    }
    
    /**
     * @return \Ramsey\Uuid\UuidInterface|null
     */
    public function getDistrictId(): ?UuidInterface
    {
        return $this->district_id;
    }
    
    /**
     * @return int|null
     */
    public function getPerPage(): ?int
    {
        return $this->perPage;
    }
    
    /**
     * @return string|null
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
    
}