<?php

declare(strict_types=1);

namespace App\Services\Dto\Presentation;

use Illuminate\Http\UploadedFile;
use JetBrains\PhpStorm\Immutable;
use Ramsey\Uuid\UuidInterface;

/**
 * Class CreatePresentationDto
 *
 * @package App\Services\Dto\Presentation
 */
#[Immutable]
final class CreatePresentationDto
{
    
    /**
     * CreatePresentationDto constructor.
     *
     * @param   \Illuminate\Http\UploadedFile  $pdf
     * @param   \Illuminate\Http\UploadedFile  $image
     * @param   \Ramsey\Uuid\UuidInterface  $building_id
     */
    public function __construct(
        private UploadedFile $pdf,
        private UploadedFile $image,
        private UuidInterface $building_id,
    ) {
    }
    
    /**
     * @return \Illuminate\Http\UploadedFile
     */
    public function getPdf(): UploadedFile
    {
        return $this->pdf;
    }
    
    /**
     * @return \Illuminate\Http\UploadedFile
     */
    public function getImage(): UploadedFile
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