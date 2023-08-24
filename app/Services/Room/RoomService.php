<?php

declare(strict_types=1);

namespace App\Services\Room;

use App\Domain\Entities\Plan;
use App\Domain\Entities\Room;
use App\Domain\ValueObject\Photo;
use App\Domain\ValueObject\Room\NumberRoom;
use App\Infrastructure\Photo\Storage\FileStorage;
use App\Infrastructure\StrictObjectManager;
use App\ReadModels\Room as RoomReadModel;
use App\Services\Dto\DeleteMassDto;
use App\Services\Dto\Room\CreateRoomDto;
use App\Services\Dto\Room\UpdateRoomDto;
use Exception;
use Illuminate\Http\UploadedFile;
use Ramsey\Uuid\UuidInterface;

final class RoomService {
    
    public function __construct(
        private StrictObjectManager $objectManager,
        private FileStorage $fileStorage
    ) {
    }
    
    
    /**
     * @param \Ramsey\Uuid\UuidInterface           $id
     * @param \App\Services\Dto\Room\CreateRoomDto $dto
     *
     * @return \App\Domain\Entities\Room
     */
    public function create(
        UuidInterface $id,
        CreateRoomDto $dto
    ): Room {
        
        /* @var Plan $plan */
        $plan = $this->objectManager->findOrFail(
            Plan::class,
            $dto->getPlanId()
        );
        
        $image = $this->fileStorage->upload(
            'buildings/' . $plan->getBuilding()
                                ->getId() . '/plans/' . $plan->getId() . '/rooms',
            $dto->getPhoto()
        );
        
        $room = Room::create(
            $id,
            $dto->getName(),
            $dto->getColor(),
            $dto->getSale(),
            Photo::create($image),
            NumberRoom::create(
                RoomReadModel::where(
                    'plan_id',
                    $dto->getPlanId()
                )
                             ->max('number_room') + 1
            ),
            $plan,
            $dto->getCoordinate(),
            $dto->getArea()
        );
        
        $this->objectManager->persist($room);
        $this->objectManager->flush();
        
        return $room;
    }
    
    /**
     * @param \Ramsey\Uuid\UuidInterface           $id
     * @param \App\Services\Dto\Room\UpdateRoomDto $dto
     *
     * @return \App\Domain\Entities\Room
     */
    public function update(
        UuidInterface $id,
        UpdateRoomDto $dto
    ): Room {
        
        /* @var Room $room */
        $room = $this->objectManager->findOrFail(
            Room::class,
            $id
        );
        
        /* @var Plan $plan */
        $plan = $this->objectManager->findOrFail(
            Plan::class,
            $dto->getPlanId()
        );
        
        if ($dto->getPhoto()){
            $room = $this->updateImage($room, $dto->getPhoto());
        }
        
        $room
            ->update(
                $dto->getName(),
                $dto->getColor(),
                $dto->getSale(),
                $plan,
                $dto->getCoordinate(),
                $dto->getArea()
            );
        
        $this->objectManager->persist($room);
        $this->objectManager->flush();
        
        return $room;
    }
    
    /**
     * @param \App\Domain\Entities\Room     $room
     * @param \Illuminate\Http\UploadedFile $file
     *
     * @return \App\Domain\Entities\Room
     */
    private function updateImage(Room $room, UploadedFile $file): Room
    {
        
        $this->fileStorage->drop(
            $room->getPhoto()
                 ->url()
        );
        
        $image = $this->fileStorage->upload(
            'buildings/' . $room->getPlan()->getBuilding()
                                ->getId() . '/plans/' . $room->getPlan()->getId() . '/rooms',
            $file
        );
        
        $room->setPhoto(Photo::create($image));
        
        return $room;
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
     * @return \App\Domain\Entities\Room
     */
    public function destroy(UuidInterface $id): Room
    {
        
        /* @var Room $room */
        $room = $this->objectManager->findOrFail(
            Room::class,
            $id
        );
        
        $this->fileStorage->drop(
            $room->getPhoto()
                 ->url()
        );
        
        $this->objectManager->remove($room);
        $this->objectManager->flush();
        
        return $room;
    }
}