<?php

declare(strict_types=1);

namespace App\Services\District;


use App\Domain\Entities\City;
use App\Domain\Entities\District;
use App\Domain\ValueObject\Slug;
use App\Infrastructure\StrictObjectManager;
use App\Services\Dto\DeleteMassDto;
use App\Services\Dto\District\DistrictUpdateDto;
use Exception;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * Class DistrictService
 *
 * @package App\Services\District
 */
final class DistrictService
{
    
    /**
     * @var \App\Infrastructure\StrictObjectManager
     */
    private StrictObjectManager $objectManager;
    
    /**
     * DistrictService constructor.
     *
     * @param \App\Infrastructure\StrictObjectManager $objectManager
     */
    public function __construct(StrictObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }
    
    /**
     * @param \App\Services\Dto\District\DistrictUpdateDto $dto
     *
     * @return \App\Domain\Entities\District
     */
    public function create(DistrictUpdateDto $dto): District
    {
        /* @var \App\Domain\Entities\City $city */
        $city = $this->objectManager->findOrFail(
            City::class,
            $dto->getCityId()
        );
        
        $district = District::create(
            Uuid::uuid4(),
            $dto->getName(),
            Slug::create($dto->getName()->names()),
            $city
        );
        
        $this->objectManager->persist($district);
        $this->objectManager->flush();
        
        return $district;
    }
    
    /**
     * @param \App\Services\Dto\District\DistrictUpdateDto $dto
     * @param \Ramsey\Uuid\UuidInterface                   $id
     *
     * @return \App\Domain\Entities\District
     */
    public function update(
        DistrictUpdateDto $dto,
        UuidInterface $id
    ): District
    {
        /* @var \App\Domain\Entities\City $city */
        $city = $this->objectManager
            ->findOrFail(City::class, $dto->getCityId());
        
        /* @var District $district */
        $district = $this->objectManager
            ->findOrFail(District::class, $id);
        
        $district
            ->setName($dto->getName())
            ->setCity($city);
        
        $this->objectManager->persist($district);
        $this->objectManager->flush();
        
        return $district;
    }
    
    /**
     * @param \Ramsey\Uuid\UuidInterface $id
     *
     * @return \App\Domain\Entities\District
     */
    public function destroy(UuidInterface $id): District
    {
        /* @var District $district */
        $district = $this->objectManager
            ->findOrFail(District::class, $id);
        
        $this->objectManager->remove($district);
        $this->objectManager->flush();
        
        return $district;
    }
    
    /**
     * @param \App\Services\Dto\DeleteMassDto $dto
     *
     * @return array
     */
    public function deleteMass(DeleteMassDto $dto): array
    {
        foreach ($dto->getIds() as $id)
        {
            try
            {
                $this->destroy($id);
            } catch (Exception)
            {
            }
        }
        
        return $dto->getIds();
    }
    
}