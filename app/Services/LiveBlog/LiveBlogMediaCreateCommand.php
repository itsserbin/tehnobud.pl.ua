<?php

namespace App\Services\LiveBlog;

use App\Domain\Entities\LiveBlog;
use App\Domain\Entities\LiveBlogsMedia;
use App\Domain\ValueObject\Photo;
use JetBrains\PhpStorm\Pure;
use Ramsey\Uuid\UuidInterface;

/**
 * Class LiveBlogMediaService
 *
 * @package App\Services\LiveBlog
 */
final class LiveBlogMediaCreateCommand
{
    
    public function __construct()
    {
    }
    
    /**
     * @param   \Ramsey\Uuid\UuidInterface  $id
     * @param   string  $media
     * @param   \App\Domain\Entities\LiveBlog  $liveBlog
     *
     * @return \App\Domain\Entities\LiveBlogsMedia
     */
    #[Pure]
    public function handle(
        UuidInterface $id,
        string $media,
        LiveBlog $liveBlog
    ): LiveBlogsMedia {
        $mediaVO = Photo::create($media);
        
        return LiveBlogsMedia::create(
            $id,
            $mediaVO,
            $liveBlog
        );
    }
    
}