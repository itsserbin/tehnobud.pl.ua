<?php

declare(strict_types=1);

namespace App\Services\Slider;

use App\Domain\Entities\Building;
use App\Domain\Entities\Slider;
use App\Domain\ValueObject\Building\Priority;
use App\Domain\ValueObject\Photo;
use App\Infrastructure\Photo\FileUploader;
use App\Infrastructure\StrictObjectManager;
use App\Services\Dto\DeleteMassDto;
use App\Services\Dto\Slider\CreateSliderDto;
use App\Services\Dto\Slider\UpdateSliderDto;
use Exception;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * Class SliderServices
 *
 * @package App\Services\Slider
 */
final class SliderServices {
    
    /**
     * BuildingService constructor.
     *
     * @param \App\Infrastructure\StrictObjectManager $objectManager
     * @param \App\Infrastructure\Photo\FileUploader  $imageUploader
     */
    public function __construct(
        private StrictObjectManager $objectManager,
        private FileUploader $imageUploader
    ) {
    }
    
    /**
     * @param \Ramsey\Uuid\UuidInterface               $id
     * @param \App\Services\Dto\Slider\CreateSliderDto $dto
     * @param \Ramsey\Uuid\UuidInterface               $building_id
     *
     * @return array
     */
    public function create(
        CreateSliderDto $dto,
        UuidInterface $building_id
    ): array {
        
        /* @var Building $building */
        $building  = $this->objectManager->findOrFail(
            Building::class,
            $building_id
        );
        $idsSlider = $building->getSliders()->map(fn(Slider $slider) => $slider->getId())->toArray();
        
        if (empty($dto->getFiles())){
            return $building->getSliders()->toArray();
        }
        
        $this->deleteMass(new DeleteMassDto($idsSlider));
        
        $sliders = [];
        
        foreach ($dto->getFiles() as $key => $file) {
            $path = $this->imageUploader->upload(
                'buildings/' . $building->getId() . '/photo/sliders',
                $file
            );
            
            $slider = Slider::create(
                Uuid::uuid4(),
                Photo::create($path),
                $building,
                Priority::create($key)
            );
            
            $this->objectManager->persist($slider);
            $sliders[] = $slider;
        }
        
        $this->objectManager->flush();
        
        return $sliders;
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
    
    public function destroy(UuidInterface $id): Slider
    {
        
        /* @var Slider $slider */
        $slider = $this->objectManager->findOrFail(
            Slider::class,
            $id
        );
        
        $this->imageUploader->drop(
            $slider->getPhoto()
                   ->path()
        );
        
        $this->objectManager->remove($slider);
        $this->objectManager->flush();
        
        return $slider;
    }
    
    public function update(UuidInterface $id, UpdateSliderDto $dto)
    {
        
        /* @var Slider $slider */
        $slider = $this->objectManager->findOrFail(
            Slider::class,
            $id
        );
        
        /* @var Building $building */
        $building = $this->objectManager->findOrFail(
            Building::class,
            $dto->getBuildingId()
        );
        
        $this->imageUploader->drop($slider->getPhoto()->path());
        
        $path = $this->imageUploader->upload(
            'buildings/' . $building->getId() . '/photo/sliders',
            $dto->getFile()
        );
        
        $slider = $slider->update(
            Photo::create($path),
            $building,
            $dto->getPriority()
        );
        
        $this->objectManager->persist($slider);
        $this->objectManager->flush();
        
        return $slider;
    }
    
}