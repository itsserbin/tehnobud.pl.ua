<?php

namespace App\Domain\Entities;

use App\Domain\ValueObject\Color;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Photo;
use App\Domain\ValueObject\Room\Area;
use App\Domain\ValueObject\Room\Coordinate;
use App\Domain\ValueObject\Room\NumberRoom;
use App\Domain\ValueObject\Room\Sale;
use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;
use Ramsey\Uuid\UuidInterface;

/**
 * Class Room
 *
 * @package App\Domain\Entities
 * @ORM\Entity
 * @ORM\Table(name="rooms")
 */
class Room extends EntityWithId {
    
    /**
     * @var \App\Domain\ValueObject\Name
     * @ORM\Embedded(class="\App\Domain\ValueObject\Name", columnPrefix=false)
     */
    private Name $name;
    
    
    /**
     * @var \App\Domain\ValueObject\Color
     * @ORM\Embedded(class="\App\Domain\ValueObject\Color", columnPrefix=false)
     */
    private Color $color;
    
    
    /**
     * @var \App\Domain\ValueObject\Room\Sale
     * @ORM\Embedded(class="\App\Domain\ValueObject\Room\Sale", columnPrefix=false)
     */
    private Sale $sale;
    
    
    /**
     * @var \App\Domain\ValueObject\Photo
     * @ORM\Embedded(class="\App\Domain\ValueObject\Photo", columnPrefix=false)
     */
    private Photo $photo;
    
    
    /**
     * @var \App\Domain\ValueObject\Room\NumberRoom
     * @ORM\Embedded(class="\App\Domain\ValueObject\Room\NumberRoom", columnPrefix=false)
     */
    private NumberRoom $numberRoom;
    
    
    /**
     * @var \App\Domain\Entities\Plan
     * @ORM\ManyToOne(targetEntity="\App\Domain\Entities\Plan")
     * @ORM\JoinColumn(name="plan_id", referencedColumnName="id")
     */
    private Plan $plan;
    
    
    /**
     * @var \App\Domain\ValueObject\Room\Coordinate
     * @ORM\Embedded(class="\App\Domain\ValueObject\Room\Coordinate", columnPrefix=false)
     */
    private Coordinate $coordinate;
    
    
    /**
     * @var \App\Domain\ValueObject\Room\Area
     * @ORM\Embedded(class="\App\Domain\ValueObject\Room\Area", columnPrefix=false)
     */
    private Area $area;
    
    
    /**
     * Room constructor.
     *
     * @param \Ramsey\Uuid\UuidInterface              $id
     * @param \App\Domain\ValueObject\Name            $name
     * @param \App\Domain\ValueObject\Color           $color
     * @param \App\Domain\ValueObject\Room\Sale       $sale
     * @param \App\Domain\ValueObject\Photo           $photo
     * @param \App\Domain\ValueObject\Room\NumberRoom $numberRoom
     * @param \App\Domain\Entities\Plan               $plan
     * @param \App\Domain\ValueObject\Room\Coordinate $coordinate
     * @param \App\Domain\ValueObject\Room\Area       $area
     */
    #[Pure]
    private function __construct(
        UuidInterface $id,
        Name $name,
        Color $color,
        Sale $sale,
        Photo $photo,
        NumberRoom $numberRoom,
        Plan $plan,
        Coordinate $coordinate,
        Area $area
    ) {
        
        parent::__construct($id);
        $this->color      = $color;
        $this->name       = $name;
        $this->sale       = $sale;
        $this->photo      = $photo;
        $this->numberRoom = $numberRoom;
        $this->plan       = $plan;
        $this->coordinate = $coordinate;
        $this->area       = $area;
    }
    
    /**
     * @param \Ramsey\Uuid\UuidInterface              $id
     * @param \App\Domain\ValueObject\Name            $name
     * @param \App\Domain\ValueObject\Color           $color
     * @param \App\Domain\ValueObject\Room\Sale       $sale
     * @param \App\Domain\ValueObject\Photo           $photo
     * @param \App\Domain\ValueObject\Room\NumberRoom $numberRoom
     * @param \App\Domain\Entities\Plan               $plan
     * @param \App\Domain\ValueObject\Room\Coordinate $coordinate
     * @param \App\Domain\ValueObject\Room\Area       $area
     *
     * @return static
     */
    #[Pure]
    public static function create(
        UuidInterface $id,
        Name $name,
        Color $color,
        Sale $sale,
        Photo $photo,
        NumberRoom $numberRoom,
        Plan $plan,
        Coordinate $coordinate,
        Area $area
    ): static {
        
        return new static(
            $id,
            $name,
            $color,
            $sale,
            $photo,
            $numberRoom,
            $plan,
            $coordinate,
            $area
        );
    }
    
    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        
        return [
            'id'          => $this->id,
            'name'        => $this->name->names(),
            'color'       => $this->color->color(),
            'is_sale'     => $this->sale->sale(),
            'photo'       => $this->photo->url(),
            'number_room' => $this->numberRoom->numberRoom(),
            'plan'        => $this->plan,
            'coordinate'  => $this->coordinate->coordinate(),
            'area'        => $this->area->area(),
            'created_at'  => Carbon::make($this->created_at),
            'updated_at'  => Carbon::make($this->updated_at),
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
     * @param \App\Domain\ValueObject\Photo $image
     *
     * @return $this
     */
    public function setPhoto(Photo $image): static
    {
        
        $this->photo = $image;
        
        return $this;
    }
    
    /**
     * @param \App\Domain\ValueObject\Name            $name
     * @param \App\Domain\ValueObject\Color           $color
     * @param \App\Domain\ValueObject\Room\Sale       $sale
     * @param \App\Domain\Entities\Plan               $plan
     * @param \App\Domain\ValueObject\Room\Coordinate $coordinate
     * @param \App\Domain\ValueObject\Room\Area       $area
     *
     * @return $this
     */
    public function update(
        Name $name,
        Color $color,
        Sale $sale,
        Plan $plan,
        Coordinate $coordinate,
        Area $area
    ): static {
        
        $this->name       = $name;
        $this->color      = $color;
        $this->sale       = $sale;
        $this->plan       = $plan;
        $this->coordinate = $coordinate;
        $this->area       = $area;
        
        return $this;
    }
    
    /**
     * @return \App\Domain\Entities\Plan
     */
    public function getPlan(): Plan
    {
        
        return $this->plan;
    }
    
}