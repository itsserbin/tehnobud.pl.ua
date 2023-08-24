<?php

namespace App\Domain\ValueObject\Room;

use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

/**
 * Class Coordinate
 *
 * @package App\Domain\ValueObject\Room
 * @ORM\Embeddable
 */
final class Coordinate
{
    
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private string $coordinate;
    
    
    /**
     * Coordinate constructor.
     *
     * @param   string  $coordinate
     */
    private function __construct(string $coordinate)
    {
        $this->coordinate = $coordinate;
    }
    
    /**
     * @param   string  $coordinate
     *
     * @return static
     */
    #[Pure]
    public static function create(string $coordinate): Coordinate
    {
        return new Coordinate($coordinate);
    }
    
    /**
     * @return string
     */
    public function coordinate(): string
    {
        return $this->coordinate;
    }
    
}