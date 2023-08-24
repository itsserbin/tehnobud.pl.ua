<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\ValueObject\Building\AdditionalInformation;
use App\Domain\ValueObject\Building\Coordinate;
use App\Domain\ValueObject\Building\DateRange;
use App\Domain\ValueObject\Building\Info;
use App\Domain\ValueObject\Building\Status;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Slug;
use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;
use Ramsey\Uuid\UuidInterface;

/**
 * Class Building
 *
 * @package App\Domain\Entities
 * @ORM\Entity
 * @ORM\Table(name="buildings")
 */
class Building extends EntityWithId {
    
    /**
     * @var Name
     * @ORM\Embedded(class="\App\Domain\ValueObject\Name", columnPrefix=false)
     */
    private Name $name;
    
    
    /**
     * @var Slug
     * @ORM\Embedded(class="\App\Domain\ValueObject\Slug", columnPrefix=false)
     */
    private Slug $slug;
    
    
    /**
     * @var Status
     * @ORM\Embedded(class="\App\Domain\ValueObject\Building\Status", columnPrefix=false)
     */
    private Status $status;
    
    
    /**
     * @var Info
     * @ORM\Embedded(class="\App\Domain\ValueObject\Building\Info", columnPrefix=false)
     */
    private Info $info;
    
    
    /**
     * @var District
     * @ORM\ManyToOne(targetEntity="\App\Domain\Entities\District")
     * @ORM\JoinColumn(name="district_id", referencedColumnName="id")
     */
    private District $district;
    
    
    /**
     * @var Coordinate
     * @ORM\Embedded(class="\App\Domain\ValueObject\Building\Coordinate", columnPrefix=false)
     */
    private Coordinate $coordinate;
    
    
    /**
     * @var AdditionalInformation
     * @ORM\Embedded(class="\App\Domain\ValueObject\Building\AdditionalInformation", columnPrefix=false)
     */
    private AdditionalInformation $additionalInformation;
    
    
    /**
     * @var DateRange
     * @ORM\Embedded(class="\App\Domain\ValueObject\Building\DateRange", columnPrefix=false)
     */
    private DateRange $dateRange;
    
    
    /**
     * @var Presentation|null
     * @ORM\OneToOne(targetEntity="\App\Domain\Entities\Presentation", mappedBy="building")
     */
    private ?Presentation $presentation = null;
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection|\App\Domain\Entities\Slider[]
     * @ORM\OneToMany(targetEntity="\App\Domain\Entities\Slider", mappedBy="building")
     */
    private $sliders;
    
    /**
     * Building constructor.
     *
     * @param UuidInterface         $id
     * @param Name                  $name
     * @param Slug                  $slug
     * @param Status                $status
     * @param Info                  $info
     * @param Coordinate            $coordinate
     * @param AdditionalInformation $additionalInformation
     * @param DateRange             $dateRange
     */
    #[Pure]
    private function __construct(
        UuidInterface $id,
        Name $name,
        Slug $slug,
        Status $status,
        Info $info,
        Coordinate $coordinate,
        AdditionalInformation $additionalInformation,
        DateRange $dateRange,
    ) {
        
        parent::__construct($id);
        $this->name                  = $name;
        $this->slug                  = $slug;
        $this->status                = $status;
        $this->info                  = $info;
        $this->coordinate            = $coordinate;
        $this->additionalInformation = $additionalInformation;
        $this->dateRange             = $dateRange;
        $this->sliders               = new ArrayCollection();
    }
    
    /**
     * @param UuidInterface         $id
     * @param Name                  $name
     * @param Slug                  $slug
     * @param Status                $status
     * @param Info                  $info
     * @param Coordinate            $coordinate
     * @param AdditionalInformation $additionalInformation
     * @param DateRange             $dateRange
     *
     * @return Building
     * @psalm-pure
     */
    #[Pure]
    public static function create(
        UuidInterface $id,
        Name $name,
        Slug $slug,
        Status $status,
        Info $info,
        Coordinate $coordinate,
        AdditionalInformation $additionalInformation,
        DateRange $dateRange,
    ): Building {
        
        return new self(
            $id,
            $name,
            $slug,
            $status,
            $info,
            $coordinate,
            $additionalInformation,
            $dateRange,
        );
    }
    
    /**
     * @param Name                  $name
     * @param Slug                  $slug
     * @param Status                $status
     * @param Info                  $info
     * @param Coordinate            $coordinate
     * @param AdditionalInformation $additionalInformation
     * @param DateRange             $dateRange
     *
     * @return $this
     */
    public function update(
        Name $name,
        Slug $slug,
        Status $status,
        Info $info,
        Coordinate $coordinate,
        AdditionalInformation $additionalInformation,
        DateRange $dateRange
    ): static {
        
        return $this
            ->setName($name)
            ->setCoordinate($coordinate)
            ->setInfo($info)
            ->setStatus($status)
            ->setSlug($slug)
            ->setAdditionalInformation($additionalInformation)
            ->setDateRange($dateRange);
    }
    
    /**
     * @param DateRange $dateRange
     *
     * @return Building
     */
    private function setDateRange(DateRange $dateRange): Building
    {
        
        $this->dateRange = $dateRange;
        
        return $this;
    }
    
    /**
     * @param AdditionalInformation $additionalInformation
     *
     * @return Building
     */
    private function setAdditionalInformation(
        AdditionalInformation $additionalInformation
    ): Building {
        
        $this->additionalInformation = $additionalInformation;
        
        return $this;
    }
    
    /**
     * @param Slug $slug
     *
     * @return Building
     */
    private function setSlug(Slug $slug): Building
    {
        
        $this->slug = $slug;
        
        return $this;
    }
    
    /**
     * @param Status $status
     *
     * @return Building
     */
    private function setStatus(Status $status): Building
    {
        
        $this->status = $status;
        
        return $this;
    }
    
    /**
     * @param Info $info
     *
     * @return Building
     */
    private function setInfo(Info $info): Building
    {
        
        $this->info = $info;
        
        return $this;
    }
    
    /**
     * @param Coordinate $coordinate
     *
     * @return Building
     */
    private function setCoordinate(Coordinate $coordinate): Building
    {
        
        $this->coordinate = $coordinate;
        
        return $this;
    }
    
    /**
     * @param Name $name
     *
     * @return Building
     */
    private function setName(Name $name): Building
    {
        
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        
        return [
            'id'                     => $this->id,
            'status'                 => $this->status->getStatus(),
            'status_color'           => $this->status->getStatusColor(),
            'description'            => $this->info->getDescription(),
            'address'                => $this->info->getAddress(),
            'price'                  => $this->info->getPrice(),
            'priority'               => $this->info->getPriority(),
            'is_active'              => $this->info->isActive(),
            'slug'                   => $this->slug->slug(),
            'name'                   => $this->name->names(),
            'coordinate'             => $this->coordinate->getCoordinate(),
            'district'               => $this->district,
            'material'               => $this->additionalInformation
                ->material(),
            'overlapping'            => $this->additionalInformation
                ->overlapping(),
            'heating'                => $this->additionalInformation->heating(),
            'floors'                 => $this->additionalInformation->floors(),
            'view'                   => $this->additionalInformation->view(),
            'total_area'             => $this->additionalInformation
                ->totalArea(),
            'additional_information' => $this->additionalInformation
                ->additionalInformation(),
            'presentation'           => $this->presentation,
            'ended_at'               => $this->dateRange->end(),
            'started_at'             => $this->dateRange->start(),
            'created_at'             => Carbon::make($this->created_at),
            'updated_at'             => Carbon::make($this->created_at),
        ];
    }
    
    /**
     * @param District $district
     *
     * @return Building
     */
    public function setDistrict(District $district): Building
    {
        
        $this->district = $district;
        
        return $this;
    }
    
    
    /**
     * @return Presentation|null
     */
    public function getPresentation(): ?Presentation
    {
        
        return $this->presentation;
    }
    
    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\App\Domain\Entities\Slider[]
     */
    public function getSliders()
    {
        
        return $this->sliders;
    }
    
}