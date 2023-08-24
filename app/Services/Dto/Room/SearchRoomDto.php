<?php

namespace App\Services\Dto\Room;

use Ramsey\Uuid\UuidInterface;

class SearchRoomDto
{
    
    /**
     * SearchBuildingDto constructor.
     *
     * @param   string|null  $name
     * @param   \Ramsey\Uuid\UuidInterface|null  $plan_id
     * @param   string|null  $orderBy
     * @param   string|null  $orderDirection
     * @param   int|null  $perPage
     */
    public function __construct(
        private ?string $name,
        private ?UuidInterface $plan_id,
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
    public function getPlanId(): ?UuidInterface
    {
        return $this->plan_id;
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