<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;


use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Immutable;

/**
 * Class Name
 *
 * @package App\Domain\ValueObject\City
 * @ORM\Embeddable
 */
#[Immutable]
final class Name
{

    /**
     * @var array
     * @ORM\Column(type="json")
     */
    #[ArrayShape([
        'ru' => 'string',
        'ua' => 'string',
    ])]
    private array $name;

    /**
     * Name constructor.
     *
     * @param  array  $name
     */
    private function __construct(array $name)
    {
        if ( ! isset($name['ru'], $name['ua'])) {
            throw new InvalidArgumentException("Name invalid");
        }
        $this->name = $name;
    }

    /**
     * @return array
     */
    #[ArrayShape(['ru' => "string", 'ua' => "string"])]
    public function names(): array
    {
        return $this->name;
    }

    /**
     * @param  array  $name
     *
     * @return \App\Domain\ValueObject\Name
     */
    public static function create(
        array $name
    ): Name {
        return new self($name);
    }


    /**
     * @param  \App\Domain\ValueObject\Name  $other
     *
     * @return bool
     */
    public function equal(self $other): bool
    {
        return $this->name['ru'] === $other->name['ru']
               && $this->name['ua'] === $other->name['ua'];
    }
}