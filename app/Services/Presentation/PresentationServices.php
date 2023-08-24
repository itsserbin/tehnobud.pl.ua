<?php

declare(strict_types=1);

namespace App\Services\Presentation;

use App\Domain\Entities\Building;
use App\Domain\Entities\Presentation;
use App\Domain\ValueObject\Photo;
use App\Domain\ValueObject\Presentation\Pdf;
use App\Infrastructure\Photo\FileUploader;
use App\Infrastructure\StrictObjectManager;
use App\Services\Dto\DeleteMassDto;
use App\Services\Dto\Presentation\CreatePresentationDto;
use App\Services\Dto\Presentation\UpdatePresentationDto;
use Exception;
use Ramsey\Uuid\UuidInterface;

/**
 * Class PresentationServices
 *
 * @package App\Services\Presentation
 */
final class PresentationServices {
    
    /**
     * PresentationServices constructor.
     *
     * @param \App\Infrastructure\StrictObjectManager $objectManager
     * @param \App\Infrastructure\Photo\FileUploader  $fileUploader
     */
    public function __construct(
        private StrictObjectManager $objectManager,
        private FileUploader $fileUploader
    ) {
    }
    
    /**
     * @param \Ramsey\Uuid\UuidInterface                           $id
     * @param \App\Services\Dto\Presentation\CreatePresentationDto $dto
     *
     * @return \App\Domain\Entities\Presentation
     */
    public function create(
        UuidInterface $id,
        CreatePresentationDto $dto
    ): Presentation {
        
        /* @var Building $building */
        $building = $this->objectManager->findOrFail(
            Building::class,
            $dto->getBuildingId()
        );
        
        if ($building->getPresentation()){
            return $building->getPresentation();
        }
        
        $image = $this->fileUploader->upload(
            'buildings/' . $building->getId() . '/presentation',
            $dto->getImage()
        );
        
        $pdf = $this->fileUploader->upload(
            'buildings/' . $building->getId() . '/presentation',
            $dto->getPdf()
        );
        
        $presentation = Presentation::create(
            $id,
            Photo::create($image),
            Pdf::create($pdf),
            $building
        );
        
        $this->objectManager->persist($presentation);
        $this->objectManager->flush();
        
        return $presentation;
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
     * @return \App\Domain\Entities\Presentation
     */
    public function destroy(UuidInterface $id): Presentation
    {
        
        /* @var Presentation $presentation */
        $presentation = $this->objectManager->findOrFail(
            Presentation::class,
            $id
        );
        
        $this->fileUploader->drop(
            $presentation->getPdf()->path()
        );
        
        $this->fileUploader->drop(
            $presentation->getPhoto()->path()
        );
        
        $this->objectManager->remove($presentation);
        $this->objectManager->flush();
        
        return $presentation;
    }
    
    /**
     * @param \Ramsey\Uuid\UuidInterface                           $id
     * @param \App\Services\Dto\Presentation\UpdatePresentationDto $dto
     *
     * @return \App\Domain\Entities\Presentation
     */
    public function update(UuidInterface $id, UpdatePresentationDto $dto): Presentation
    {
        
        /* @var Building $building */
        $building = $this->objectManager->findOrFail(
            Building::class,
            $dto->getBuildingId()
        );
        /* @var Presentation $presentation */
        $presentation = $this->objectManager->findOrFail(
            Presentation::class,
            $id
        );
        
        $pdf = null;
        
        if ($dto->getPdf()){
            $this->fileUploader->drop(
                $presentation->getPdf()->path()
            );
            
            $pdf = $this->fileUploader->upload(
                'buildings/' . $building->getId() . '/presentation',
                $dto->getPdf()
            );
        }
        
        $image = null;
        if ($dto->getImage()){
            $this->fileUploader->drop(
                $presentation->getPhoto()->path()
            );
            
            $image = $this->fileUploader->upload(
                'buildings/' . $building->getId() . '/presentation',
                $dto->getImage()
            );
        }
        
        $presentation = $presentation->update(
            $image ? Photo::create($image) : null,
            $pdf ? Pdf::create($pdf) : null,
            $building
        );
        
        $this->objectManager->persist($presentation);
        $this->objectManager->flush();
        
        return $presentation;
    }
    
}