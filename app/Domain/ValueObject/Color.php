<?php

namespace App\Domain\ValueObject;

use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;
use JetBrains\PhpStorm\Immutable;

/**
 * Class Color
 *
 * @package App\Domain\ValueObject
 * @ORM\Embeddable
 */
#[Immutable]
final class Color
{
    
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private string $color;
    
    
    private function __construct(string $color)
    {
        if ( ! preg_match(
            '/^#(?:[0-9a-fA-F]{3}){1,2}$/',
            $color
        ))
        {
            throw new InvalidArgumentException("Color $color is not valid");
        }
        
        $this->color = $color;
    }
    
    /**
     * @param   string  $color
     *
     * @return static
     */
    public static function create(
        string $color
    ): Color {
        return new Color($color);
    }
    
    /**
     * @return string
     */
    public function color(): string
    {
        return $this->color;
    }
    
}