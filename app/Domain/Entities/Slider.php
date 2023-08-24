<?php

namespace App\Domain\Entities;

use App\Domain\ValueObject\Building\Priority;
use App\Domain\ValueObject\Photo;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Support\Carbon;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;
use Ramsey\Uuid\UuidInterface;

/**
 * Class Slider
 *
 * @package App\Domain\Entities
 * @ORM\Entity
 * @ORM\Table(name="sliders")
 */
class Slider extends EntityWithId {
    
    /**
     * @var \App\Domain\ValueObject\Photo
     * @ORM\Embedded(class="\App\Domain\ValueObject\Photo", columnPrefix=false)
     */
    private Photo $photo;
    
    
    /**
     * @var \App\Domain\ValueObject\Building\Priority
     * @ORM\Embedded(class="\App\Domain\ValueObject\Building\Priority", columnPrefix=false)
     */
    private Priority $priority;
    
    
    /**
     * @var \App\Domain\Entities\Building
     * @ORM\ManyToOne(targetEntity="\App\Domain\Entities\Building")
     * @ORM\JoinColumn(name="building_id", referencedColumnName="id")
     */
    private Building $building;
    
    
    /**
     * Slider constructor.
     *
     * @param \Ramsey\Uuid\UuidInterface                $id
     * @param \App\Domain\ValueObject\Photo             $photo
     * @param \App\Domain\Entities\Building             $building
     * @param \App\Domain\ValueObject\Building\Priority $priority
     */
    #[Pure]
    private function __construct(
        UuidInterface $id,
        Photo $photo,
        Building $building,
        Priority $priority
    ) {
        
        parent::__construct($id);
        $this->photo    = $photo;
        $this->building = $building;
        $this->priority = $priority;
    }
    
    /**
     * @param \Ramsey\Uuid\UuidInterface                $id
     * @param \App\Domain\ValueObject\Photo             $photo
     * @param \App\Domain\Entities\Building             $building
     * @param \App\Domain\ValueObject\Building\Priority $priority
     *
     * @return \App\Domain\Entities\Slider
     */
    #[Pure]
    public static function create(
        UuidInterface $id,
        Photo $photo,
        Building $building,
        Priority $priority
    ): Slider {
        
        return new static(
            $id,
            $photo,
            $building,
            $priority
        );
    }
    
    /**
     * @return array
     */
    #[ArrayShape([
        'id'         => UuidInterface::class,
        'url'        => "string",
        'building'   => Building::class,
        'priority'   => "int",
        'created_at' => "\Illuminate\Support\Carbon|null",
        'updated_at' => "\Illuminate\Support\Carbon|null",
    ])]
    public function jsonSerialize(): array
    {
        
        return [
            'id'         => $this->id,
            'url'        => $this->photo->url(),
            'building'   => $this->building,
            'priority'   => $this->priority->getPriority(),
            'created_at' => Carbon::make($this->created_at),
            'updated_at' => Carbon::make($this->updated_at),
        ];
    }
    
    /**
     * @return \App\Domain\ValueObject\Photo
     */
    public function getPhoto(): Photo
    {
        
        return $this->photo;
    }
    
    /**
     * @param \App\Domain\ValueObject\Photo             $photo
     * @param \App\Domain\Entities\Building             $building
     * @param \App\Domain\ValueObject\Building\Priority $priority
     *
     * @return $this
     */
    public function update(Photo $photo, Building $building, Priority $priority): static
    {
        
        $this->photo    = $photo;
        $this->building = $building;
        $this->priority = $priority;
        
        return $this;
    }
    
}