<?php


namespace App\Services\Dto\City;


use App\Domain\ValueObject\Name;
use JetBrains\PhpStorm\Immutable;

/**
 * Class CityUpdateDto
 *
 * @package App\Services\Dto\City
 */
#[Immutable]
final class CityUpdateDto
{

    /**
     * @var \App\Domain\ValueObject\Name
     */
    private Name $name;

    /**
     * CityCreateDto constructor.
     *
     * @param  \App\Domain\ValueObject\Name  $name
     */
    public function __construct(Name $name)
    {
        $this->name = $name;
    }

    /**
     * @return \App\Domain\ValueObject\Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

}