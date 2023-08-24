<?php

namespace App\Services\Dto\Slider;

use JetBrains\PhpStorm\Immutable;

/**
 * Class CreateSliderDto
 *
 * @package App\Services\Dto\Slider
 */
#[Immutable]
final class CreateSliderDto {
    
    /**
     * CreateSliderDto constructor.
     *
     * @param \Illuminate\Http\UploadedFile[] $files
     */
    public function __construct(
        private array $files,
    ) {
    }
    
    /**
     * @return \Illuminate\Http\UploadedFile[]
     */
    public function getFiles(): array
    {
        
        return $this->files;
    }
}