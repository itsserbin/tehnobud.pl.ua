<?php


namespace App\Services\Dto;


/**
 * Class DeleteMassBuildingDto
 *
 * @package App\Services\Dto\Building
 */
class DeleteMassDto
{
    /**
     * DeleteMassBuildingDto constructor.
     *
     * @param \Ramsey\Uuid\UuidInterface[] $ids
     */
    public function __construct(
        private array $ids
    )
    {
    }
    
    /**
     * @return \Ramsey\Uuid\UuidInterface[]
     */
    public function getIds(): array
    {
        return $this->ids;
    }
    
}