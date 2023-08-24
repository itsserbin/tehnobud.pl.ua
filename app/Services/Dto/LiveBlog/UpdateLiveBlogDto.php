<?php

namespace App\Services\Dto\LiveBlog;

use App\Domain\ValueObject\LiveBlog\Description;
use App\Domain\ValueObject\LiveBlog\Video;
use App\Domain\ValueObject\Name;
use DateTimeImmutable;
use Ramsey\Uuid\UuidInterface;

/**
 * Class UpdateLiveBlogDto
 *
 * @package App\Services\Dto\LiveBlog
 */
final class UpdateLiveBlogDto {
    
    /**
     * UpdateLiveBlogDto constructor.
     *
     * @param \App\Domain\ValueObject\Name                 $name
     * @param \App\Domain\ValueObject\LiveBlog\Description $description
     * @param \DateTimeImmutable                           $published_at
     * @param \Ramsey\Uuid\UuidInterface                   $building_id
     * @param \App\Domain\ValueObject\LiveBlog\Video       $videos
     * @param array                                        $images
     */
    public function __construct(
        private Name $name,
        private Description $description,
        private DateTimeImmutable $published_at,
        private UuidInterface $building_id,
        private Video $videos,
        private array $images
    ) {
    }
    
    /**
     * @return array
     */
    public function getImages(): array
    {
        
        return $this->images;
    }
    
    /**
     * @return \App\Domain\ValueObject\Name
     */
    public function getName(): Name
    {
        
        return $this->name;
    }
    
    /**
     * @return \App\Domain\ValueObject\LiveBlog\Description
     */
    public function getDescription(): Description
    {
        
        return $this->description;
    }
    
    /**
     * @return \DateTimeImmutable
     */
    public function getPublishedAt(): DateTimeImmutable
    {
        
        return $this->published_at;
    }
    
    /**
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function getBuildingId(): UuidInterface
    {
        
        return $this->building_id;
    }
    
    /**
     * @return \App\Domain\ValueObject\LiveBlog\Video
     */
    public function getVideos(): Video
    {
        
        return $this->videos;
    }
    
}