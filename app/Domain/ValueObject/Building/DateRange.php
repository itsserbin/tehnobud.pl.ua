<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\Building;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;
use JetBrains\PhpStorm\Immutable;

/**
 * Class DateRange
 *
 * @package App\Domain\ValueObject\Building
 * @ORM\Embeddable
 * @psalm-immutable
 */
#[Immutable]
final class DateRange {
    
    /**
     * @var \DateTimeImmutable|null
     * @ORM\Column(type="datetime_immutable", nullable=true, name="started_at")
     */
    private ?DateTimeImmutable $start;
    
    
    /**
     * @var \DateTimeImmutable|null
     * @ORM\Column(type="datetime_immutable", nullable=true, name="ended_at")
     */
    private ?DateTimeImmutable $end;
    
    
    /**
     * DateRange constructor.
     *
     * @param \DateTimeImmutable|null $start
     * @param \DateTimeImmutable|null $end
     */
    private function __construct(
        ?DateTimeImmutable $start,
        ?DateTimeImmutable $end
    ) {
        
        if (
            ($start !== null && $end !== null)
            && ($start >= $end)
        ){
            throw new InvalidArgumentException(
                "Дата старта не может быть больше или равна чем дата окончания"
            );
        }
        
        $this->start = $start;
        $this->end   = $end;
    }
    
    /**
     * @param \DateTimeImmutable|null $start
     * @param \DateTimeImmutable|null $end
     *
     * @return \App\Domain\ValueObject\Building\DateRange
     */
    public static function create(
        ?DateTimeImmutable $start,
        ?DateTimeImmutable $end
    ): DateRange {
        
        return new DateRange(
            $start,
            $end
        );
    }
    
    /**
     * @return \DateTimeImmutable|null
     */
    public function start(): ?DateTimeImmutable
    {
        
        return $this->start;
    }
    
    /**
     * @return \DateTimeImmutable|null
     */
    public function end(): ?DateTimeImmutable
    {
        
        return $this->end;
    }
    
}