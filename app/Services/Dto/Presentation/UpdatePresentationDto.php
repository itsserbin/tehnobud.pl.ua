<?php

namespace App\Services\Dto\Presentation;

use Illuminate\Http\UploadedFile;
use Ramsey\Uuid\UuidInterface;

class UpdatePresentationDto {
    
    /**
     * CreatePresentationDto constructor.
     *
     * @param \Illuminate\Http\UploadedFile|null $pdf
     * @param \Illuminate\Http\UploadedFile|null $image
     * @param \Ramsey\Uuid\UuidInterface         $building_id
     */
    public function __construct(
        private ?UploadedFile $pdf,
        private ?UploadedFile $image,
        private UuidInterface $building_id,
    ) {
    }
    
    /**
     * @return \Illuminate\Http\UploadedFile|null
     */
    public function getPdf(): ?UploadedFile
    {
        
        return $this->pdf;
    }
    
    /**
     * @return \Illuminate\Http\UploadedFile|null
     */
    public function getImage(): ?UploadedFile
    {
        
        return $this->image;
    }
    
    /**
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function getBuildingId(): UuidInterface
    {
        
        return $this->building_id;
    }
}