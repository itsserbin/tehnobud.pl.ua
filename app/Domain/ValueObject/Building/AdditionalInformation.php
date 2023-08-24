<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\Building;

use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Immutable;
use JetBrains\PhpStorm\Pure;

/**
 * Class AdditionalInformation
 *
 * @package App\Domain\ValueObject\Building
 * @psalm-immutable
 *
 * @ORM\Embeddable
 */
#[Immutable]
final class AdditionalInformation
{
    
    /**
     * @var int|null
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $floors;
    
    
    /**
     * @var float|null
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $total_area;
    
    
    /**
     * @var array<array-key, string>|null
     * @ORM\Column(type="json", nullable=true)
     */
    #[ArrayShape(['ru' => 'string', 'ua' => 'string'])]
    private ?array $heating;
    
    
    /**
     * @var array<array-key, string>|null
     * @ORM\Column(type="json", nullable=true)
     */
    #[ArrayShape(['ru' => 'string', 'ua' => 'string'])]
    private ?array $overlapping;
    
    
    /**
     * @var array<array-key, string>|null
     * @ORM\Column(type="json", nullable=true)
     */
    #[ArrayShape(['ru' => 'string', 'ua' => 'string'])]
    private ?array $material;
    
    
    /**
     * @var array<array-key, string>|null
     * @ORM\Column(type="json", nullable=true)
     */
    #[ArrayShape(['ru' => 'string', 'ua' => 'string'])]
    private ?array $view;
    
    
    /**
     * @var bool
     * @ORM\Column(type="boolean", options={"default":false})
     */
    private bool $parking;
    
    
    /**
     * @var array<array<array-key, string>>
     * @ORM\Column(type="json")
     */
    private ?array $additional_information;
    
    
    /**
     * AdditionalInformation constructor.
     *
     * @param   int|null  $floors
     * @param   float|null  $total_area
     * @param   array|null  $heating
     * @param   array|null  $overlapping
     * @param   array|null  $material
     * @param   array|null  $view
     * @param   bool  $parking
     * @param   array|null  $additional_information
     */
    private function __construct(
        ?int $floors,
        ?float $total_area,
        ?array $heating,
        ?array $overlapping,
        ?array $material,
        ?array $view,
        bool $parking,
        ?array $additional_information
    ) {
        $this->floors                 = $floors;
        $this->total_area             = $total_area;
        $this->heating                = $heating;
        $this->overlapping            = $overlapping;
        $this->material               = $material;
        $this->view                   = $view;
        $this->parking                = $parking;
        $this->additional_information = $additional_information ?? [];
    }
    
    /**
     * @param   int|null  $floors
     * @param   float|null  $total_area
     * @param   array|null  $heating
     * @param   array|null  $overlapping
     * @param   array|null  $material
     * @param   array|null  $view
     * @param   bool  $parking
     * @param   array|null  $additional_information
     *
     * @return \App\Domain\ValueObject\Building\AdditionalInformation
     */
    #[Pure]
    public static function create(
        ?int $floors,
        ?float $total_area,
        ?array $heating,
        ?array $overlapping,
        ?array $material,
        ?array $view,
        bool $parking,
        ?array $additional_information
    ): AdditionalInformation {
        return new AdditionalInformation(
            $floors,
            $total_area,
            $heating,
            $overlapping,
            $material,
            $view,
            $parking,
            $additional_information
        );
    }
    
    /**
     * @return int|null
     */
    public function floors(): ?int
    {
        return $this->floors;
    }
    
    
    /**
     * @return float|null
     */
    public function totalArea(): ?float
    {
        return $this->total_area;
    }
    
    /**
     * @return array<array-key, string>|null
     */
    #[ArrayShape(['ru' => "string", 'ua' => "string"])]
    public function heating(): ?array
    {
        return $this->heating;
    }
    
    /**
     * @return array<array-key, string>|null
     */
    #[ArrayShape(['ru' => "string", 'ua' => "string"])]
    public function overlapping(): ?array
    {
        return $this->overlapping;
    }
    
    /**
     * @return array<array-key, string>|null
     */
    #[ArrayShape(['ru' => "string", 'ua' => "string"])]
    public function material(): ?array
    {
        return $this->material;
    }
    
    /**
     * @return array<array-key, string>|null
     */
    #[ArrayShape(['ru' => "string", 'ua' => "string"])]
    public function view(): ?array
    {
        return $this->view;
    }
    
    
    /**
     * @return array<array<array-key, string>>|null
     */
    public function additionalInformation(): ?array
    {
        return $this->additional_information;
    }
    
}