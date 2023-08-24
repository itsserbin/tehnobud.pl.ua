<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\Room;

use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

/**
 * Class NumberRoom
 *
 * @package App\Domain\ValueObject\Room
 * @ORM\Embeddable
 */
final class NumberRoom
{
    
    /**
     * @var int
     * @ORM\Column(type="integer", name="number_room")
     */
    private int $numberRoom;
    
    
    /**
     * NumberRoom constructor.
     *
     * @param   int  $numberRoom
     */
    private function __construct(int $numberRoom)
    {
        $this->numberRoom = $numberRoom;
    }
    
    /**
     * @param   int  $numberRoom
     *
     * @return \App\Domain\ValueObject\Room\NumberRoom
     */
    #[Pure]
    public static function create(
        int $numberRoom
    ): NumberRoom {
        return new NumberRoom($numberRoom);
    }
    
    /**
     * @return int
     */
    public function numberRoom(): int
    {
        return $this->numberRoom;
    }
    
    /**
     * @param   \App\Domain\ValueObject\Room\NumberRoom  $other
     *
     * @return bool
     */
    public function equal(self $other): bool
    {
        return $this->numberRoom === $other->numberRoom;
    }
    
}