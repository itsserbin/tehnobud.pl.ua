<?php

namespace App\Services\Plan;

use App\Domain\Entities\Building;
use App\Domain\Entities\Plan;
use App\Domain\ValueObject\Photo;
use App\Infrastructure\Photo\FileUploader;
use App\Infrastructure\StrictObjectManager;
use App\Services\Dto\DeleteMassDto;
use App\Services\Dto\Plan\CreatePlanDto;
use App\Services\Dto\Plan\UpdatePlanDto;
use Exception;
use Illuminate\Http\UploadedFile;
use Ramsey\Uuid\UuidInterface;

/**
 * Class PlanServices
 *
 * @package App\Services\Plan
 */
final class PlanServices {
    
    /**
     * PlanServices constructor.
     *
     * @param \App\Infrastructure\StrictObjectManager $objectManager
     * @param \App\Infrastructure\Photo\FileUploader  $fileStorage
     */
    public function __construct(
        private StrictObjectManager $objectManager,
        private FileUploader $fileStorage
    ) {
    }
    
    /**
     * @param \Ramsey\Uuid\UuidInterface           $id
     * @param \App\Services\Dto\Plan\CreatePlanDto $dto
     *
     * @return \App\Domain\Entities\Plan
     */
    public function create(
        UuidInterface $id,
        CreatePlanDto $dto
    ): Plan {
        
        /* @var Building $building */
        $building = $this->objectManager->findOrFail(
            Building::class,
            $dto->getBuildingId()
        );
        
        $planPhoto = $this->fileStorage->upload(
            'buildings/' . $building->getId() . '/plans/' . $id,
            $dto->getPlan()
        );
        
        $plan = Plan::create(
            $id,
            $dto->getName(),
            Photo::create($planPhoto),
            $building,
            $dto->getPriority()
        );
        
        $this->objectManager->persist($plan);
        $this->objectManager->flush();
        
        return $plan;
    }
    
    /**
     * @param \Ramsey\Uuid\UuidInterface           $id
     * @param \App\Services\Dto\Plan\UpdatePlanDto $dto
     *
     * @return \App\Domain\Entities\Plan
     */
    public function update(
        UuidInterface $id,
        UpdatePlanDto $dto
    ): Plan {
        
        /* @var Building $building */
        $building = $this->objectManager->findOrFail(
            Building::class,
            $dto->getBuildingId()
        );
        
        /* @var Plan $plan */
        $plan = $this->objectManager->findOrFail(
            Plan::class,
            $id
        );
        
        if ($dto->getPlan()){
            $plan = $this->updateImage($plan, $dto->getPlan());
        }
        
        $plan->update(
            $dto->getName(),
            $building,
            $dto->getPriority()
        );
        
        $this->objectManager->persist($plan);
        $this->objectManager->flush();
        
        return $plan;
    }
    
    /**
     * @param \App\Domain\Entities\Plan     $plan
     * @param \Illuminate\Http\UploadedFile $file
     *
     * @return \App\Domain\Entities\Plan
     */
    private function updateImage(Plan $plan, UploadedFile $file): Plan
    {
        
        $this->fileStorage->drop($plan->getPhoto()->path());
        
        $planPhoto = $this->fileStorage->upload(
            'buildings/' . $plan->getBuilding()->getId() . '/plans/' . $plan->getId(),
            $file
        );
        
        $plan->setPhoto(Photo::create($planPhoto));
        
        return $plan;
    }
    
    /**
     * @param \App\Services\Dto\DeleteMassDto $dto
     *
     * @return array
     */
    public function deleteMass(DeleteMassDto $dto): array
    {
        
        foreach ($dto->getIds() as $id) {
            try {
                $this->destroy($id);
            } catch (Exception) {
            }
        }
        
        return $dto->getIds();
    }
    
    /**
     * @param \Ramsey\Uuid\UuidInterface $id
     *
     * @return \App\Domain\Entities\Plan
     */
    public function destroy(UuidInterface $id): Plan
    {
        
        /* @var Plan $plan */
        $plan = $this->objectManager->findOrFail(
            Plan::class,
            $id
        );
        
        $this->fileStorage->dropDirectory(
            'buildings/' . $plan->getBuilding()
                                ->getId() . '/plans/' . $id
        );
        
        $this->objectManager->remove($plan);
        $this->objectManager->flush();
        
        return $plan;
    }
    
}