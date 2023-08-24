<?php

namespace App\Services\Dto\LiveBlog;

use App\Domain\ValueObject\LiveBlog\Description;
use App\Domain\ValueObject\LiveBlog\Video;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Slug;
use DateTimeImmutable;
use Ramsey\Uuid\UuidInterface;

/**
 * Class CreateLiveBlogDto
 *
 * @package App\Services\Dto\LiveBlog
 */
final class CreateLiveBlogDto
{
    
    /**
     * CreateLiveBlogDto constructor.
     *
     * @param \App\Domain\ValueObject\Name                 $name
     * @param \App\Domain\ValueObject\LiveBlog\Description $description
     * @param \DateTimeImmutable                           $published_at
     * @param \Ramsey\Uuid\UuidInterface                   $building_id
     * @param \App\Domain\ValueObject\LiveBlog\Video       $videos
     * @param array<\Illuminate\Http\UploadedFile>         $images
     * @param \App\Domain\ValueObject\Slug                 $slug
     */
    public function __construct(
        private Name $name,
        private Description $description,
        private DateTimeImmutable $published_at,
        private UuidInterface $building_id,
        private Video $videos,
        private array $images,
        private Slug $slug
    )
    {
    }
    
    /**
     * @return \App\Domain\ValueObject\Slug
     */
    public function getSlug(): Slug
    {
        return $this->slug;
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
    
    /**
     * @return \Illuminate\Http\UploadedFile[]
     */
    public function getImages(): array
    {
        return $this->images;
    }
    
    /**
     * @return \DateTimeImmutable
     */
    public function getPublishedAt(): DateTimeImmutable
    {
        return $this->published_at;
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
    
}