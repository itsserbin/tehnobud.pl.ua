<?php

namespace App\Domain\Entities;

use App\Domain\ValueObject\Photo;
use App\Domain\ValueObject\Presentation\Pdf;
use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;
use Ramsey\Uuid\UuidInterface;

/**
 * Class Presentation
 *
 * @package App\Domain\Entities
 * @ORM\Entity
 * @ORM\Table(name="presentations")
 */
class Presentation extends EntityWithId {
    
    /**
     * @var \App\Domain\ValueObject\Photo
     * @ORM\Embedded(class="\App\Domain\ValueObject\Photo", columnPrefix=false)
     */
    private Photo $photo;
    
    
    /**
     * @var \App\Domain\ValueObject\Presentation\Pdf
     * @ORM\Embedded(class="\App\Domain\ValueObject\Presentation\Pdf", columnPrefix=false)
     */
    private Pdf $pdf;
    
    
    /**
     * @var \App\Domain\Entities\Building
     * @ORM\OneToOne(targetEntity="\App\Domain\Entities\Building")
     * @ORM\JoinColumn(name="building_id", referencedColumnName="id")
     */
    private Building $building;
    
    
    /**
     * Presentation constructor.
     *
     * @param \Ramsey\Uuid\UuidInterface               $id
     * @param \App\Domain\ValueObject\Photo            $photo
     * @param \App\Domain\ValueObject\Presentation\Pdf $pdf
     * @param \App\Domain\Entities\Building            $building
     */
    #[Pure]
    private function __construct(
        UuidInterface $id,
        Photo $photo,
        Pdf $pdf,
        Building $building
    ) {
        
        parent::__construct($id);
        $this->photo    = $photo;
        $this->pdf      = $pdf;
        $this->building = $building;
    }
    
    /**
     * @param \Ramsey\Uuid\UuidInterface               $id
     * @param \App\Domain\ValueObject\Photo            $photo
     * @param \App\Domain\ValueObject\Presentation\Pdf $pdf
     * @param \App\Domain\Entities\Building            $building
     *
     * @return \App\Domain\Entities\Presentation
     */
    #[Pure]
    public static function create(
        UuidInterface $id,
        Photo $photo,
        Pdf $pdf,
        Building $building
    ): Presentation {
        
        return new self(
            $id,
            $photo,
            $pdf,
            $building
        );
    }
    
    /**
     * @return array
     */
    #[ArrayShape([
        'id'         => UuidInterface::class,
        'pdf'        => "string",
        'photo'      => "string",
        'building'   => Building::class,
        'created_at' => "\Carbon\Carbon|null",
        'updated_at' => "\Carbon\Carbon|null",
    ])]
    public function jsonSerialize(): array
    {
        
        return [
            'id'         => $this->id,
            'pdf'        => $this->pdf->url(),
            'photo'      => $this->photo->url(),
           // 'building'   => $this->building,
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
     * @return \App\Domain\ValueObject\Presentation\Pdf
     */
    public function getPdf(): Pdf
    {
        
        return $this->pdf;
    }
    
    /**
     * @param \App\Domain\ValueObject\Photo|null            $photo
     * @param \App\Domain\ValueObject\Presentation\Pdf|null $pdf
     * @param \App\Domain\Entities\Building                 $building
     *
     * @return $this
     */
    public function update(?Photo $photo, ?Pdf $pdf, Building $building): static
    {
        
        if ($photo){
            $this->photo = $photo;
        }
        if ($pdf){
            $this->pdf = $pdf;
        }
        
        $this->building = $building;
        
        return $this;
    }
    
}