<?php

declare(strict_types=1);

namespace App\Services\Dto\Building;

use App\Domain\ValueObject\Building\AdditionalInformation;
use App\Domain\ValueObject\Building\Coordinate;
use App\Domain\ValueObject\Building\DateRange;
use App\Domain\ValueObject\Building\Info;
use App\Domain\ValueObject\Building\Status;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Slug;
use Ramsey\Uuid\UuidInterface;

final class UpdateBuildingDto
{
    
    /**
     * CreateBuildingDto constructor.
     *
     * @param   \Ramsey\Uuid\UuidInterface  $district_id
     * @param   \App\Domain\ValueObject\Building\Info  $info
     * @param   \App\Domain\ValueObject\Building\Status  $status
     * @param   \App\Domain\ValueObject\Name  $name
     * @param   \App\Domain\ValueObject\Building\Coordinate  $coordinate
     * @param   \App\Domain\ValueObject\Slug  $slug
     * @param   \App\Domain\ValueObject\Building\AdditionalInformation  $additionalInformation
     * @param   \App\Domain\ValueObject\Building\DateRange  $dateRange
     */
    public function __construct(
        private UuidInterface $district_id,
        private Info $info,
        private Status $status,
        private Name $name,
        private Coordinate $coordinate,
        private Slug $slug,
        private AdditionalInformation $additionalInformation,
        private DateRange $dateRange
    ) {
    }
    
    /**
     * @return \App\Domain\ValueObject\Building\AdditionalInformation
     */
    public function getAdditionalInformation(): AdditionalInformation
    {
        return $this->additionalInformation;
    }
    
    /**
     * @return \App\Domain\ValueObject\Building\DateRange
     */
    public function getDateRange(): DateRange
    {
        return $this->dateRange;
    }
    
    /**
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function getDistrictId(): UuidInterface
    {
        return $this->district_id;
    }
    
    /**
     * @return \App\Domain\ValueObject\Building\Info
     */
    public function getInfo(): Info
    {
        return $this->info;
    }
    
    /**
     * @return \App\Domain\ValueObject\Building\Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }
    
    /**
     * @return \App\Domain\ValueObject\Name
     */
    public function getName(): Name
    {
        return $this->name;
    }
    
    /**
     * @return \App\Domain\ValueObject\Building\Coordinate
     */
    public function getCoordinate(): Coordinate
    {
        return $this->coordinate;
    }
    
    /**
     * @return \App\Domain\ValueObject\Slug
     */
    public function getSlug(): Slug
    {
        return $this->slug;
    }
    
}