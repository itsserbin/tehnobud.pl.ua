<?php

declare(strict_types=1);

namespace App\Services\Dto\Room;

use App\Domain\ValueObject\Color;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Room\Area;
use App\Domain\ValueObject\Room\Coordinate;
use App\Domain\ValueObject\Room\Sale;
use Illuminate\Http\UploadedFile;
use Ramsey\Uuid\UuidInterface;

/**
 * Class UpdateRoomDto
 *
 * @package App\Services\Dto\Room
 */
final class UpdateRoomDto {
    
    /**
     * UpdateRoomDto constructor.
     *
     * @param \App\Domain\ValueObject\Name            $name
     * @param \App\Domain\ValueObject\Color           $color
     * @param \App\Domain\ValueObject\Room\Sale       $sale
     * @param \Ramsey\Uuid\UuidInterface              $plan_id
     * @param \App\Domain\ValueObject\Room\Coordinate $coordinate
     * @param \App\Domain\ValueObject\Room\Area       $area
     * @param \Illuminate\Http\UploadedFile|null      $photo
     */
    public function __construct(
        private Name $name,
        private Color $color,
        private Sale $sale,
        private UuidInterface $plan_id,
        private Coordinate $coordinate,
        private Area $area,
        private ?UploadedFile $photo
    ) {
    }
    
    /**
     * @return \Illuminate\Http\UploadedFile|null
     */
    public function getPhoto(): ?UploadedFile
    {
        
        return $this->photo;
    }
    
    
    /**
     * @return \App\Domain\ValueObject\Room\Area
     */
    public function getArea(): Area
    {
        
        return $this->area;
    }
    
    /**
     * @return \App\Domain\ValueObject\Room\Coordinate
     */
    public function getCoordinate(): Coordinate
    {
        
        return $this->coordinate;
    }
    
    
    /**
     * @return \App\Domain\ValueObject\Name
     */
    public
    function getName(): Name
    {
        
        return $this->name;
    }
    
    /**
     * @return \App\Domain\ValueObject\Color
     */
    public
    function getColor(): Color
    {
        
        return $this->color;
    }
    
    /**
     * @return \App\Domain\ValueObject\Room\Sale
     */
    public
    function getSale(): Sale
    {
        
        return $this->sale;
    }
    
    /**
     * @return \Ramsey\Uuid\UuidInterface
     */
    public
    function getPlanId(): UuidInterface
    {
        
        return $this->plan_id;
    }
    
}