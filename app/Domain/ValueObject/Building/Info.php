<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\Building;

use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Immutable;
use JetBrains\PhpStorm\Pure;

/**
 * Class Info
 *
 * @package App\Domain\ValueObject\Building
 * @ORM\Embeddable
 * @psalm-immutable
 */
#[Immutable]
final class Info
{

    /**
     * @var array
     * @ORM\Column(type="json")
     */
    #[ArrayShape(['ru' => 'string', 'ua' => 'string'])]
    private array $address;

    /**
     * @var array
     * @ORM\Column(type="json")
     */
    #[ArrayShape(['ru' => 'string', 'ua' => 'string'])]
    private array $description;

    /**
     * @var float|null
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $price;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private bool $is_active;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private int $priority;
    
    
    /**
     * Info constructor.
     *
     * @param array      $address
     * @param array      $description
     * @param float|null $price
     * @param bool       $is_active
     * @param int        $priority
     */
    private function __construct(
        array $address,
        array $description,
        ?float $price,
        bool $is_active,
        int $priority,
    ) {
        $this->address = $address;
        $this->description = $description;
        $this->price = $price;
        $this->is_active = $is_active;
        $this->priority = $priority;
    }
    
    /**
     * @param array      $address
     * @param array      $description
     * @param float|null $price
     * @param bool       $is_active
     * @param int        $priority
     *
     * @return \App\Domain\ValueObject\Building\Info
     */
    #[Pure]
    public static function create(
        array $address,
        array $description,
        ?float $price,
        bool $is_active,
        int $priority
    ): Info {
        return new self(
            $address,
            $description,
            $price,
            $is_active,
            $priority
        );
    }

    /**
     * @return array
     */
    #[ArrayShape(['ru' => "string", 'ua' => "string"])]
    public function getAddress(): array
    {
        return $this->address;
    }

    /**
     * @return array
     */
    #[ArrayShape(['ru' => "string", 'ua' => "string"])]
    public function getDescription(): array
    {
        return $this->description;
    }
    
    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->is_active;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

}