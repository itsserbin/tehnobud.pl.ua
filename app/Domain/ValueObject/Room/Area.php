<?php

namespace App\Domain\ValueObject\Room;

use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

/**
 * Class Area
 *
 * @package App\Domain\ValueObject\Room
 * @ORM\Embeddable
 */
class Area {
    /**
     * @var string
     * @ORM\Column(type="decimal")
     */
    private string $area;
    
    
    /**
     * Coordinate constructor.
     *
     * @param float $area
     */
    private function __construct(float $area)
    {
        $this->area = $area;
    }
    
    /**
     * @param float $area
     *
     * @return static
     */
    #[Pure]
    public static function create(float $area): self
    {
        return new self($area);
    }
    
    /**
     * @return float
     */
    public function area(): float
    {
        return $this->area;
    }
}