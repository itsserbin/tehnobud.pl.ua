<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\Presentation;

use Doctrine\ORM\Mapping as ORM;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use JetBrains\PhpStorm\Pure;

/**
 * Class Pdf
 *
 * @package App\Domain\ValueObject\Presentation
 * @ORM\Embeddable
 */
final class Pdf
{
    
    /**
     * @var string
     * @ORM\Column(type="string", name="path_pdf")
     */
    private string $path;
    
    
    /**
     * Pdf constructor.
     *
     * @param   string  $path
     */
    private function __construct(string $path)
    {
        $this->path = $path;
    }
    
    /**
     * @param   string  $path
     *
     * @return \App\Domain\ValueObject\Presentation\Pdf
     */
    #[Pure]
    public static function create(
        string $path
    ): Pdf {
        return new self($path);
    }
    
    /**
     * @return string
     */
    public function path(): string
    {
        return $this->path;
    }
    
    /**
     * @return string
     */
    public function url(): string
    {
        return URL::to('/') . Storage::url(
                $this->path
            );
    }
    
}