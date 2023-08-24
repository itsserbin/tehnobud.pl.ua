<?php

namespace App\Domain\ValueObject;

use Doctrine\ORM\Mapping as ORM;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use JetBrains\PhpStorm\Immutable;
use JetBrains\PhpStorm\Pure;

/**
 * @ORM\Embeddable
 */
#[Immutable]
final class Photo
{
    
    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     */
    private ?string $path;
    
    
    /**
     * Photo constructor.
     *
     * @param   string|null  $path
     */
    private function __construct(?string $path)
    {
        $this->path = $path;
    }
    
    /**
     * @param   string|null  $path
     *
     * @return \App\Domain\ValueObject\Photo
     */
    #[Pure]
    public static function create(
        ?string $path
    ): Photo {
        return new self($path);
    }
    
    public function path(): string
    {
        return $this->path;
    }
    
    public function url(): string
    {
        return URL::to('/') . Storage::url(
                $this->path
            );
    }
    
}