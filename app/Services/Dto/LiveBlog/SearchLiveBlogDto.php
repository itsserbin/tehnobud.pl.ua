<?php

namespace App\Services\Dto\LiveBlog;

use Ramsey\Uuid\UuidInterface;

final class SearchLiveBlogDto
{
    
    /**
     * SearchBuildingDto constructor.
     *
     * @param   string|null  $name
     * @param   \Ramsey\Uuid\UuidInterface|null  $building_id
     * @param   string|null  $orderBy
     * @param   string|null  $orderDirection
     * @param   int|null  $perPage
     */
    public function __construct(
        private ?string $name,
        private ?UuidInterface $building_id,
        private ?string $orderBy,
        private ?string $orderDirection,
        private ?int $perPage
    ) {
    }
    
    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
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
    
    /**
     * @return int|null
     */
    public function getPerPage(): ?int
    {
        return $this->perPage;
    }
    
}