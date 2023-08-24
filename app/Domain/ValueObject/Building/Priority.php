<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\Building;

use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Immutable;
use JetBrains\PhpStorm\Pure;

/**
 * Class Priority
 *
 * @package App\Domain\ValueObject\Building
 * @ORM\Embeddable
 * @psalm-immutable
 */
#[Immutable]
final class Priority
{
    
    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private int $priority;
    
    
    /**
     * Priority constructor.
     *
     * @param   int  $priority
     */
    private function __construct(int $priority)
    {
        $this->priority = $priority;
    }
    
    /**
     * @param   int  $priority
     *
     * @return \App\Domain\ValueObject\Building\Priority
     */
    #[Pure]
    public static function create(
        int $priority
    ): Priority {
        return new Priority(
            $priority
        );
    }
    
    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }
    
}