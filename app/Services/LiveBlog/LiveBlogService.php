<?php

namespace App\Services\LiveBlog;

use App\Domain\Entities\Building;
use App\Domain\Entities\LiveBlog;
use App\Domain\Entities\LiveBlogsMedia;
use App\Infrastructure\Photo\FileUploader;
use App\Infrastructure\StrictObjectManager;
use App\Services\Dto\DeleteMassDto;
use App\Services\Dto\LiveBlog\CreateLiveBlogDto;
use App\Services\Dto\LiveBlog\UpdateLiveBlogDto;
use Exception;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class LiveBlogService {
    
    public function __construct(
        private StrictObjectManager $objectManager,
        private LiveBlogMediaCreateCommand $liveBlogMediaCreateCommand,
        private FileUploader $fileUploader
    ) {
    }
    
    /**
     * @param \Ramsey\Uuid\UuidInterface                   $id
     * @param \App\Services\Dto\LiveBlog\CreateLiveBlogDto $dto
     *
     * @return \App\Domain\Entities\LiveBlog
     */
    public function create(
        UuidInterface $id,
        CreateLiveBlogDto $dto
    ): LiveBlog {
        
        /* @var Building $building */
        $building = $this->objectManager->findOrFail(
            Building::class,
            $dto->getBuildingId()
        );
        
        $liveBlog = LiveBlog::create(
            $id,
            $dto->getName(),
            $dto->getDescription(),
            $dto->getPublishedAt(),
            $building,
            $dto->getVideos(),
            $dto->getSlug()
        );
        
        $liveBlog = $this->createMedia($dto->getImages(), $liveBlog);
        
        $this->objectManager->persist($liveBlog);
        $this->objectManager->flush();
        
        return $liveBlog;
    }
    
    /**
     * @param array                         $images
     * @param \App\Domain\Entities\LiveBlog $liveBlog
     *
     * @return \App\Domain\Entities\LiveBlog
     */
    private function createMedia(array $images, LiveBlog $liveBlog): LiveBlog
    {
        
        foreach ($images as $image) {
            $liveBlog->addMedia(
                $this->liveBlogMediaCreateCommand->handle(
                    Uuid::uuid4(),
                    $this->fileUploader->upload(
                        'buildings/' . $liveBlog->getBuilding()
                                                ->getId() . '/blogs/' . $liveBlog->getId(),
                        $image
                    ),
                    $liveBlog
                )
            );
        }
        
        return $liveBlog;
    }
    
    /**
     * @param \Ramsey\Uuid\UuidInterface                   $id
     * @param \App\Services\Dto\LiveBlog\UpdateLiveBlogDto $dto
     *
     * @return \App\Domain\Entities\LiveBlog
     */
    public function update(
        UuidInterface $id,
        UpdateLiveBlogDto $dto
    ): LiveBlog {
        
        /* @var LiveBlog $liveBlog */
        $liveBlog = $this->objectManager->findOrFail(
            LiveBlog::class,
            $id
        );
        
        /* @var Building $building */
        $building = $this->objectManager->findOrFail(
            Building::class,
            $dto->getBuildingId()
        );
        
        if ( ! empty($dto->getImages())){
            $this->deleteMedia($liveBlog);
            $liveBlog = $this->createMedia($dto->getImages(), $liveBlog);
        }
        
        $liveBlog->update(
            $dto->getName(),
            $dto->getPublishedAt(),
            $dto->getDescription(),
            $building,
            $dto->getVideos()
        );
        
        $this->objectManager->persist($liveBlog);
        $this->objectManager->flush();
        
        return $liveBlog;
    }
    
    /**
     * @param \App\Domain\Entities\LiveBlog $liveBlog
     */
    private function deleteMedia(LiveBlog $liveBlog): void
    {
        
        $liveBlog->getLiveBlogMedias()->map(
            function (LiveBlogsMedia $media) {
                
                $this->fileUploader->drop($media->getMedia()->path());
                $this->objectManager->remove($media);
            }
        );
        
        $this->objectManager->flush();
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
     * @return \App\Domain\Entities\LiveBlog
     */
    public function destroy(UuidInterface $id): LiveBlog
    {
        
        /* @var LiveBlog $liveBlog */
        $liveBlog = $this->objectManager->findOrFail(
            LiveBlog::class,
            $id
        );
        
        $this->fileUploader->dropDirectory(
            'buildings/' . $liveBlog->getBuilding()
                                    ->getId() . '/blogs/' . $id
        );
        
        $this->objectManager->remove($liveBlog);
        $this->objectManager->flush();
        
        return $liveBlog;
    }
}
