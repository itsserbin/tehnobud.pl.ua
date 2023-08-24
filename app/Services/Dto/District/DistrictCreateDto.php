<?php

declare(strict_types=1);

namespace App\Services\Dto\District;

use App\Domain\ValueObject\Name;
use JetBrains\PhpStorm\Immutable;
use Ramsey\Uuid\UuidInterface;

/**
 * Class DistrictCreateDto
 *
 * @package App\Services\Dto
 */
#[Immutable]
final class DistrictCreateDto
{

    /**
     * @var \App\Domain\ValueObject\Name
     */
    private Name $name;

    /**
     * @var \Ramsey\Uuid\UuidInterface
     */
    private UuidInterface $city_id;

    /**
     * DistrictCreateDto constructor.
     *
     * @param  \App\Domain\ValueObject\Name  $name
     * @param  \Ramsey\Uuid\UuidInterface  $city_id
     */
    public function __construct(Name $name, UuidInterface $city_id)
    {
        $this->name    = $name;
        $this->city_id = $city_id;
    }

    /**
     * @return \App\Domain\ValueObject\Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function getCityId(): UuidInterface
    {
        return $this->city_id;
    }

}