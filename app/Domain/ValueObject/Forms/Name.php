<?php

namespace App\Domain\ValueObject\Forms;

use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

/**
 * Class Name
 *
 * @package App\Domain\ValueObject\Forms
 * @ORM\Embeddable
 */
class Name
{
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private string $name;
    
    /**
     * Email constructor.
     *
     * @param string $name
     */
    private function __construct(string $name)
    {
        $this->name = $name;
    }
    
    /**
     * @param string $name
     *
     * @return \App\Domain\ValueObject\Forms\Name
     */
    #[Pure]
    public static function create(
        string $name
    ): Name {
        return new self($name);
    }
    
    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }
}