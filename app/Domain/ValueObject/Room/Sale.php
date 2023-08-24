<?php

namespace App\Domain\ValueObject\Room;

use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

/**
 * Class Sale
 *
 * @package App\Domain\ValueObject\Room
 * @ORM\Embeddable
 */
final class Sale
{
    
    /**
     * @var bool
     * @ORM\Column(type="boolean", name="is_sale")
     */
    private bool $sale;
    
    
    private function __construct(bool $sale)
    {
        $this->sale = $sale;
    }
    
    
    /**
     * @param   bool  $sale
     *
     * @return static
     */
    #[Pure]
    public static function create(
        bool $sale
    ): Sale {
        return new Sale($sale);
    }
    
    /**
     * @return bool
     */
    public function sale(): bool
    {
        return $this->sale;
    }
    
    
    /**
     * @param   \App\Domain\ValueObject\Room\Sale  $other
     *
     * @return bool
     */
    public function equal(self $other): bool
    {
        return $this->sale === $other->sale;
    }
    
    /**
     * @return string
     */
    public function color(): string
    {
        return '#757575';
    }
    
}