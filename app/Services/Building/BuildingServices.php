<?php

declare(strict_types=1);

namespace App\Services\Building;

use App\Domain\Entities\Building;
use App\Domain\Entities\District;
use App\Infrastructure\StrictObjectManager;
use App\Services\Dto\Building\CreateBuildingDto;
use App\Services\Dto\DeleteMassDto;
use App\Services\Dto\Building\UpdateBuildingDto;
use Exception;
use Ramsey\Uuid\UuidInterface;

/**
 * Class BuildingService
 *
 * @package App\Services\Building
 */
final class BuildingServices
{
    
    /**
     * BuildingService constructor.
     *
     * @param \App\Infrastructure\StrictObjectManager $objectManager
     */
    public function __construct(
        private StrictObjectManager $objectManager,
    )
    {
    }
    
    /**
     * @param \Ramsey\Uuid\UuidInterface                   $id
     * @param \App\Services\Dto\Building\CreateBuildingDto $dto
     *
     * @return \App\Domain\Entities\Building
     */
    public function create(
        UuidInterface $id,
        CreateBuildingDto $dto
    ): Building
    {
        /* @var $district District */
        $district = $this->objectManager->findOrFail(
            District::class,
            $dto->getDistrictId()
        );
        
        $building = Building::create(
            $id,
            $dto->getName(),
            $dto->getSlug(),
            $dto->getStatus(),
            $dto->getInfo(),
            $dto->getCoordinate(),
            $dto->getAdditionalInformation(),
            $dto->getDateRange(),
        )
                            ->setDistrict($district);
        
        $this->objectManager->persist($building);
        $this->objectManager->flush();
        
        return $building;
    }
    
    
    /**
     * @param \Ramsey\Uuid\UuidInterface                   $id
     * @param \App\Services\Dto\Building\UpdateBuildingDto $dto
     *
     * @return \App\Domain\Entities\Building
     */
    public function update(
        UuidInterface $id,
        UpdateBuildingDto $dto
    ): Building
    {
        /* @var $district District */
        $district = $this->objectManager->findOrFail(
            District::class,
            $dto->getDistrictId()
        );
        
        /* @var $building Building */
        $building = $this->objectManager->findOrFail(
            Building::class,
            $id
        );
        
        $building
            ->setDistrict($district)
            ->update(
                $dto->getName(),
                $dto->getSlug(),
                $dto->getStatus(),
                $dto->getInfo(),
                $dto->getCoordinate(),
                $dto->getAdditionalInformation(),
                $dto->getDateRange()
            );
        
        $this->objectManager->persist($building);
        $this->objectManager->flush();
        
        return $building;
    }
    
    
    /**
     * @param \Ramsey\Uuid\UuidInterface $id
     *
     * @return \App\Domain\Entities\Building
     */
    public function delete(UuidInterface $id): Building
    {
        /* @var $building Building */
        $building = $this->objectManager->findOrFail(
            Building::class,
            $id
        );
        
        $this->objectManager->remove($building);
        $this->objectManager->flush();
        
        return $building;
    }
    
    /**
     * @param \App\Services\Dto\DeleteMassDto $dto
     *
     * @return array
     */
    public function destroyMass(DeleteMassDto $dto): array
    {
        
        foreach ($dto->getIds() as $id)
        {
            
            try
            {
                $this->delete($id);
            } catch (Exception)
            {
            }
        }
        
        return $dto->getIds();
    }
}