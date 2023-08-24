<?php

namespace App\Domain\ValueObject;

use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

/**
 * Class Phone
 *
 * @package App\Domain\ValueObject
 * @ORM\Embeddable
 */
class Phone
{
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private string $phone;
    
    /**
     * Phone constructor.
     *
     * @param string $phone
     */
    public function __construct(string $phone)
    {
        $this->phone = $phone;
    }
    
    /**
     * @param string $phone
     *
     * @return \App\Domain\ValueObject\Phone
     */
    #[Pure]
    public static function create(
        string $phone
    ): Phone {
        return new self($phone);
    }
    
    /**
     * @return string
     */
    public function phone(): string
    {
        return $this->phone;
    }
}