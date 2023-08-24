<?php

declare(strict_types=1);

namespace App\Domain\Entities;


use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Slug;
use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;
use Ramsey\Uuid\UuidInterface;

/**
 * Class District
 *
 * @package App\Domain\Entities
 * @ORM\Entity
 * @ORM\Table(name="districts")
 */
class District extends EntityWithId
{

    /**
     * @var \App\Domain\ValueObject\Name
     * @ORM\Embedded(class="\App\Domain\ValueObject\Name", columnPrefix=false)
     */
    private Name $name;

    /**
     * @var \App\Domain\ValueObject\Slug
     * @ORM\Embedded(class="\App\Domain\ValueObject\Slug", columnPrefix=false)
     */
    private Slug $slug;

    /**
     * @var \App\Domain\Entities\City
     * @ORM\ManyToOne(targetEntity="\App\Domain\Entities\City")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     */
    private City $city;

    /**
     * District constructor.
     *
     * @param  \Ramsey\Uuid\UuidInterface  $id
     * @param  \App\Domain\ValueObject\Name  $name
     * @param  \App\Domain\ValueObject\Slug  $slug
     * @param  \App\Domain\Entities\City  $city
     */
    #[Pure]
    private function __construct(
        UuidInterface $id,
        Name $name,
        Slug $slug,
        City $city
    ) {
        parent::__construct($id);
        $this->name = $name;
        $this->slug = $slug;
        $this->city = $city;
    }

    /**
     * @param  \Ramsey\Uuid\UuidInterface  $id
     * @param  \App\Domain\ValueObject\Name  $name
     * @param  \App\Domain\ValueObject\Slug  $slug
     * @param  \App\Domain\Entities\City  $city
     *
     * @return static
     */
    #[Pure]
    public static function create(
        UuidInterface $id,
        Name $name,
        Slug $slug,
        City $city
    ): static {
        return new static($id, $name, $slug, $city);
    }

    /**
     * @return array
     */
    #[ArrayShape([
        'id'         => UuidInterface::class,
        'name'       => "array", 'slug' => "string",
        'city'       => City::class,
        'updated_at' => "\Carbon\Carbon|null",
        'created_at' => "\Carbon\Carbon|null",
    ])]
    public function jsonSerialize(): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name->names(),
            'slug'       => $this->slug->slug(),
            'city'       => $this->city,
            'updated_at' => Carbon::make($this->updated_at),
            'created_at' => Carbon::make($this->created_at),
        ];
    }

    /**
     * @param  \App\Domain\ValueObject\Name  $name
     *
     * @return \App\Domain\Entities\District
     */
    public function setName(Name $name): District
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param  \App\Domain\Entities\City  $city
     *
     * @return \App\Domain\Entities\District
     */
    public function setCity(City $city): District
    {
        $this->city = $city;

        return $this;
    }

}