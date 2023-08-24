<?php

namespace App\Domain\ValueObject\Building;

use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class Coordinate
 *
 * @package App\Domain\ValueObject\Building
 * @ORM\Embeddable
 */
final class Coordinate
{

    /**
     * @var float
     */
    private float $lat;

    /**
     * @var float
     */
    private float $lon;

    /**
     * @var array
     * @ORM\Column(type="json")
     */
    #[ArrayShape(['lat' => 'float', 'lon' => 'float'])]
    private array $coordinate;

    /**
     * Coordinate constructor.
     *
     * @param   float  $lat
     * @param   float  $lon
     */
    private function __construct(float $lat, float $lon)
    {
        $this->lat = $lat;
        $this->lon = $lon;
        $this->coordinate = [
            'lon' => $lon,
            'lat' => $lat,
        ];
    }

    /**
     * @param   float  $lat
     * @param   float  $lon
     *
     * @return \App\Domain\ValueObject\Building\Coordinate
     */
    public static function create(
        float $lat,
        float $lon
    ): Coordinate {
        return new self(
            $lat,
            $lon
        );
    }

    /**
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * @return float
     */
    public function getLon(): float
    {
        return $this->lon;
    }

    /**
     * @return array
     */
    #[ArrayShape(['lat' => "float", 'lon' => "float"])]
    public function getCoordinate(): array
    {
        return $this->coordinate;
    }

}