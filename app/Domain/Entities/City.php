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
 * Class City
 *
 * @package App\Domain\Entity
 * @ORM\Entity
 * @ORM\Table(name="cities")
 */
class City extends EntityWithId
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
     * City constructor.
     *
     * @param  \Ramsey\Uuid\UuidInterface  $id
     * @param  \App\Domain\ValueObject\Name  $name
     * @param  \App\Domain\ValueObject\Slug  $slug
     */
    #[Pure]
    protected function __construct(
        UuidInterface $id,
        Name $name,
        Slug $slug
    ) {
        parent::__construct($id);
        $this->name = $name;
        $this->slug = $slug;
    }

    /**
     * @param  \Ramsey\Uuid\UuidInterface  $id
     * @param  \App\Domain\ValueObject\Name  $name
     * @param  \App\Domain\ValueObject\Slug  $slug
     *
     * @return \App\Domain\Entities\City
     */
    #[Pure]
    public static function create(
        UuidInterface $id,
        Name $name,
        Slug $slug
    ): City {
        return new self($id, $name, $slug);
    }

    /**
     * @return \App\Domain\ValueObject\Name
     */
    public function getName(): Name
    {
        return $this->name;
    }


    /**
     * @return array
     */
    #[ArrayShape([
        'id'         => UuidInterface::class,
        'name'       => "array",
        'slug'       => 'string',
        'created_at' => "\Carbon\Carbon|null",
        'updated_at' => "\Carbon\Carbon|null",
    ])]
    public function jsonSerialize(): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name->names(),
            'slug'       => $this->slug->slug(),
            'created_at' => Carbon::make($this->created_at),
            'updated_at' => Carbon::make($this->updated_at),
        ];
    }

    /**
     * @param  \App\Domain\ValueObject\Name  $name
     *
     * @return $this
     */
    public function setName(Name $name): self
    {
        $this->name = $name;

        return $this;
    }

}