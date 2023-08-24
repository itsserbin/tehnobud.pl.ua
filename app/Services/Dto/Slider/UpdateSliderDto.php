<?php

namespace App\Services\Dto\Slider;

use App\Domain\ValueObject\Building\Priority;
use Illuminate\Http\UploadedFile;
use Ramsey\Uuid\UuidInterface;

class UpdateSliderDto {
    
    /**
     * CreateSliderDto constructor.
     *
     * @param \Illuminate\Http\UploadedFile             $file
     * @param \Ramsey\Uuid\UuidInterface                $building_id
     * @param \App\Domain\ValueObject\Building\Priority $priority
     */
    public function __construct(
        private UploadedFile $file,
        private UuidInterface $building_id,
        private Priority $priority
    ) {
    }
    
    /**
     * @return \Illuminate\Http\UploadedFile
     */
    public function getFile(): UploadedFile
    {
        
        return $this->file;
    }
    
    /**
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function getBuildingId(): UuidInterface
    {
        
        return $this->building_id;
    }
    
    /**
     * @return \App\Domain\ValueObject\Building\Priority
     */
    public function getPriority(): Priority
    {
        
        return $this->priority;
    }
}