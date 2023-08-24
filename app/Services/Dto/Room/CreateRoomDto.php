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
 * Class CreateRoomDto
 *
 * @package App\Services\Dto\Room
 */
final class CreateRoomDto {
    
    /**
     * CreateRoomDto constructor.
     *
     * @param \App\Domain\ValueObject\Name            $name
     * @param \App\Domain\ValueObject\Color           $color
     * @param \App\Domain\ValueObject\Room\Sale       $sale
     * @param \Illuminate\Http\UploadedFile           $photo
     * @param \Ramsey\Uuid\UuidInterface              $plan_id
     * @param \App\Domain\ValueObject\Room\Coordinate $coordinate
     * @param \App\Domain\ValueObject\Room\Area       $area
     */
    public function __construct(
        private Name $name,
        private Color $color,
        private Sale $sale,
        private UploadedFile $photo,
        private UuidInterface $plan_id,
        private Coordinate $coordinate,
        private Area $area
    ) {
    }
    
    /**
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function getPlanId(): UuidInterface
    {
        
        return $this->plan_id;
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
    public function getName(): Name
    {
        
        return $this->name;
    }
    
    /**
     * @return \App\Domain\ValueObject\Color
     */
    public function getColor(): Color
    {
        
        return $this->color;
    }
    
    /**
     * @return \App\Domain\ValueObject\Room\Sale
     */
    public function getSale(): Sale
    {
        
        return $this->sale;
    }
    
    /**
     * @return \Illuminate\Http\UploadedFile
     */
    public function getPhoto(): UploadedFile
    {
        
        return $this->photo;
    }
    
}