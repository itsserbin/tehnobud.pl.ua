<?php

namespace App\Domain\Entities;

use App\Domain\ValueObject\Photo;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;
use Ramsey\Uuid\UuidInterface;

/**
 * Class LiveBlogsMedia
 *
 * @package App\Domain\Entities
 * @ORM\Entity
 * @ORM\Table(name="live_blogs_medias")
 */
class LiveBlogsMedia extends EntityWithId
{
    
    /**
     * @var \App\Domain\ValueObject\Photo
     * @ORM\Embedded(class="\App\Domain\ValueObject\Photo", columnPrefix=false)
     */
    private Photo $media;
    
    
    /**
     * @var \App\Domain\Entities\LiveBlog
     * @ORM\ManyToOne(targetEntity="\App\Domain\Entities\LiveBlog", cascade={"persist"})
     * @ORM\JoinColumn(name="live_blog_id", referencedColumnName="id")
     */
    private LiveBlog $liveBlog;
    
    
    /**
     * LiveBlogsMedia constructor.
     *
     * @param   \Ramsey\Uuid\UuidInterface  $id
     * @param   \App\Domain\ValueObject\Photo  $media
     * @param   \App\Domain\Entities\LiveBlog  $liveBlog
     */
    #[Pure]
    private function __construct(
        UuidInterface $id,
        Photo $media,
        LiveBlog $liveBlog
    ) {
        parent::__construct($id);
        $this->media    = $media;
        $this->liveBlog = $liveBlog;
    }
    
    /**
     * @param   \Ramsey\Uuid\UuidInterface  $id
     * @param   \App\Domain\ValueObject\Photo  $media
     * @param   \App\Domain\Entities\LiveBlog  $liveBlog
     *
     * @return static
     */
    #[Pure]
    public static function create(
        UuidInterface $id,
        Photo $media,
        LiveBlog $liveBlog
    ): static {
        return new static($id, $media, $liveBlog);
    }
    
    /**
     * @return array
     */
    #[ArrayShape([
        'id'    => UuidInterface::class,
        'media' => "string",
    ])]
    public function jsonSerialize(): array
    {
        return [
            'id'    => $this->id,
            'media' => $this->media->url(),
        ];
    }
    
    /**
     * @param   \App\Domain\Entities\LiveBlog  $liveBlog
     *
     * @return LiveBlogsMedia
     */
    public function setLiveBlog(LiveBlog $liveBlog): LiveBlogsMedia
    {
        $this->liveBlog = $liveBlog;
        
        return $this;
    }
    
    /**
     * @return \App\Domain\Entities\LiveBlog
     */
    public function getLiveBlog(): LiveBlog
    {
        return $this->liveBlog;
    }
    
    /**
     * @return \App\Domain\ValueObject\Photo
     */
    public function getMedia(): Photo
    {
        return $this->media;
    }
    
}