<?php

namespace App\Domain\Entities;

use App\Domain\ValueObject\Building\Priority;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Photo;
use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;
use Ramsey\Uuid\UuidInterface;

/**
 * Class Plan
 *
 * @package App\Domain\Entities
 * @ORM\Entity
 * @ORM\Table(name="plans")
 */
class Plan extends EntityWithId {
    
    /**
     * @var \App\Domain\ValueObject\Name
     * @ORM\Embedded(class="\App\Domain\ValueObject\Name", columnPrefix=false)
     */
    private Name $name;
    
    
    /**
     * @var \App\Domain\ValueObject\Photo
     * @ORM\Embedded(class="\App\Domain\ValueObject\Photo",
     *     columnPrefix=false)
     */
    private Photo $photo;
    
    
    /**
     * @var \App\Domain\Entities\Building
     * @ORM\ManyToOne(targetEntity="\App\Domain\Entities\Building")
     * @ORM\JoinColumn(name="building_id", referencedColumnName="id")
     */
    private Building $building;
    
    
    /**
     * @var \App\Domain\ValueObject\Building\Priority
     * @ORM\Embedded(class="\App\Domain\ValueObject\Building\Priority", columnPrefix=false)
     */
    private Priority $priority;
    
    
    /**
     * Plan constructor.
     *
     * @param \Ramsey\Uuid\UuidInterface                $id
     * @param \App\Domain\ValueObject\Name              $name
     * @param \App\Domain\ValueObject\Photo             $photo
     * @param \App\Domain\Entities\Building             $building
     * @param \App\Domain\ValueObject\Building\Priority $priority
     */
    #[Pure]
    private function __construct(
        UuidInterface $id,
        Name $name,
        Photo $photo,
        Building $building,
        Priority $priority
    ) {
        
        parent::__construct($id);
        $this->name     = $name;
        $this->photo    = $photo;
        $this->building = $building;
        $this->priority = $priority;
    }
    
    /**
     * @param \Ramsey\Uuid\UuidInterface                $id
     * @param \App\Domain\ValueObject\Name              $name
     * @param \App\Domain\ValueObject\Photo             $photo
     * @param \App\Domain\Entities\Building             $building
     * @param \App\Domain\ValueObject\Building\Priority $priority
     *
     * @return \App\Domain\Entities\Plan
     */
    #[Pure]
    public static function create(
        UuidInterface $id,
        Name $name,
        Photo $photo,
        Building $building,
        Priority $priority
    ): Plan {
        
        return new self(
            $id,
            $name,
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
        'plan'       => "string",
        'name'       => "array",
        'building'   => Building::class,
        'created_at' => "\Carbon\Carbon|null",
        'updated_at' => "\Carbon\Carbon|null",
        'priority'   => "integer",
    ])]
    public function jsonSerialize(): array
    {
        
        return [
            'id'         => $this->id,
            'plan'       => $this->photo->url(),
            'name'       => $this->name->names(),
            'building'   => $this->building,
            'priority'   => $this->priority->getPriority(),
            'created_at' => Carbon::make($this->created_at),
            'updated_at' => Carbon::make($this->updated_at),
        ];
    }
    
    /**
     * @param \App\Domain\ValueObject\Name              $name
     * @param \App\Domain\Entities\Building             $building
     * @param \App\Domain\ValueObject\Building\Priority $priority
     *
     * @return $this
     */
    public function update(
        Name $name,
        Building $building,
        Priority $priority
    ): self {
        
        $this->name     = $name;
        $this->building = $building;
        $this->priority = $priority;
        
        return $this;
    }
    
    
    /**
     * @return \App\Domain\Entities\Building
     */
    public function getBuilding(): Building
    {
        
        return $this->building;
    }
    
    /**
     * @return \App\Domain\ValueObject\Photo
     */
    public function getPhoto(): Photo
    {
        
        return $this->photo;
    }
    
    /**
     * @param \App\Domain\ValueObject\Photo $photo
     *
     * @return $this
     */
    public function setPhoto(Photo $photo): static
    {
        
        $this->photo = $photo;
        
        return $this;
    }
    
}