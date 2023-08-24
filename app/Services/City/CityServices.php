<?php

declare(strict_types=1);

namespace App\Services\City;


use App\Domain\Entities\City;
use App\Domain\ValueObject\Slug;
use App\Infrastructure\StrictObjectManager;
use App\Services\Dto\City\CityCreateDto;
use App\Services\Dto\City\CityUpdateDto;
use App\Services\Dto\DeleteMassDto;
use Exception;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * Class CityServices
 *
 * @package App\Services\City
 */
final class CityServices
{
    
    /**
     * @var \App\Infrastructure\StrictObjectManager
     */
    private StrictObjectManager $objectManager;
    
    /**
     * CityServices constructor.
     *
     * @param \App\Infrastructure\StrictObjectManager $objectManager
     */
    public function __construct(StrictObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }
    
    /**
     * @param \App\Services\Dto\City\CityCreateDto $dto
     *
     * @return \App\Domain\Entities\City
     */
    public function create(CityCreateDto $dto): City
    {
        $city = City::create(
            Uuid::uuid4(),
            $dto->getName(),
            Slug::create($dto->getName()->names())
        );
        
        $this->objectManager->persist($city);
        $this->objectManager->flush();
        
        return $city;
    }
    
    /**
     * @param \Ramsey\Uuid\UuidInterface           $id
     * @param \App\Services\Dto\City\CityUpdateDto $dto
     *
     * @return \App\Domain\Entities\City
     */
    public function update(
        UuidInterface $id,
        CityUpdateDto $dto
    ): City
    {
        /** @var City $city */
        $city = $this->objectManager->findOrFail(City::class, $id);
        
        $city->setName($dto->getName());
        
        $this->objectManager->persist($city);
        $this->objectManager->flush();
        
        return $city;
    }
    
    /**
     * @param \Ramsey\Uuid\UuidInterface $id
     *
     * @return \App\Domain\Entities\City
     */
    public function delete(UuidInterface $id): City
    {
        /** @var City $city */
        $city = $this->objectManager->findOrFail(City::class, $id);
        
        $this->objectManager->remove($city);
        $this->objectManager->flush();
        
        return $city;
    }
    
    /**
     * @param \App\Services\Dto\DeleteMassDto $dto
     *
     * @return array
     */
    public function deleteMass(DeleteMassDto $dto): array
    {
        try
        {
            foreach ($dto->getIds() as $id)
            {
                $this->delete($id);
            }
        } catch (Exception)
        {
        }
        
        return $dto->getIds();
    }
    
}