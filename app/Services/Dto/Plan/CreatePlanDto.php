<?php

declare(strict_types=1);

namespace App\Services\Dto\Plan;

use App\Domain\ValueObject\Building\Priority;
use App\Domain\ValueObject\Name;
use Illuminate\Http\UploadedFile;
use JetBrains\PhpStorm\Immutable;
use Ramsey\Uuid\UuidInterface;

/**
 * Class CreatePlanDto
 *
 * @package App\Services\Dto\Plan
 */
#[Immutable]
final class CreatePlanDto {
    
    /**
     * CreatePlanDto constructor.
     *
     * @param \Illuminate\Http\UploadedFile             $plan
     * @param \App\Domain\ValueObject\Name              $name
     * @param \Ramsey\Uuid\UuidInterface                $buildingId
     * @param \App\Domain\ValueObject\Building\Priority $priority
     */
    public function __construct(
        private UploadedFile $plan,
        private Name $name,
        private UuidInterface $buildingId,
        private Priority $priority
    ) {
    }
    
    /**
     * @return \App\Domain\ValueObject\Building\Priority
     */
    public function getPriority(): Priority
    {
        
        return $this->priority;
    }
    
    /**
     * @return \Illuminate\Http\UploadedFile
     */
    public function getPlan(): UploadedFile
    {
        
        return $this->plan;
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