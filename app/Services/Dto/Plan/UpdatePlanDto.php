<?php

declare(strict_types=1);

namespace App\Services\Dto\Plan;

use App\Domain\ValueObject\Building\Priority;
use App\Domain\ValueObject\Name;
use Illuminate\Http\UploadedFile;
use Ramsey\Uuid\UuidInterface;

/**
 * Class UpdatePlanDto
 *
 * @package App\Services\Dto\Plan
 */
final class UpdatePlanDto {
    
    /**
     * UpdatePlanDto constructor.
     *
     * @param \App\Domain\ValueObject\Name              $name
     * @param \Ramsey\Uuid\UuidInterface                $buildingId
     * @param \App\Domain\ValueObject\Building\Priority $priority
     * @param \Illuminate\Http\UploadedFile|null        $plan
     */
    public function __construct(
        private Name $name,
        private UuidInterface $buildingId,
        private Priority $priority,
        private ?UploadedFile $plan
    ) {
    }
    
    /**
     * @return \Illuminate\Http\UploadedFile|null
     */
    public function getPlan(): ?UploadedFile
    {
        
        return $this->plan;
    }
    
    /**
     * @return \App\Domain\ValueObject\Building\Priority
     */
    public function getPriority(): Priority
    {
        
        return $this->priority;
    }
    
    
    /**
     * @return \App\Domain\ValueObject\Name
     */
    public function getName(): Name
    {
        
        return $this->name;
    }
    
    /**
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function getBuildingId(): UuidInterface
    {
        
        return $this->buildingId;
    }
    
}