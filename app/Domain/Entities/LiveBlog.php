<?php

namespace App\Domain\Entities;

use App\Domain\ValueObject\LiveBlog\Description;
use App\Domain\ValueObject\LiveBlog\Video;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Slug;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Support\Carbon;
use JetBrains\PhpStorm\Pure;
use Ramsey\Uuid\UuidInterface;

/**
 * Class LiveBlog
 *
 * @package App\Domain\Entities
 * @ORM\Entity
 * @ORM\Table(name="live_blogs")
 */
class LiveBlog extends EntityWithId
{
    
    /**
     * @var \App\Domain\ValueObject\Name
     * @ORM\Embedded(class="\App\Domain\ValueObject\Name", columnPrefix=false)
     */
    private Name $name;
    
    
    /**
     * @var \App\Domain\ValueObject\LiveBlog\Description
     * @ORM\Embedded(class="\App\Domain\ValueObject\LiveBlog\Description", columnPrefix=false)
     */
    private Description $description;
    
    
    /**
     * @var \DateTimeImmutable
     * @ORM\Column(type="date_immutable")
     */
    private DateTimeImmutable $published_at;
    
    
    /**
     * @var \App\Domain\Entities\Building
     * @ORM\ManyToOne(targetEntity="\App\Domain\Entities\Building")
     * @ORM\JoinColumn(name="building_id", referencedColumnName="id")
     */
    private Building $building;
    
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="\App\Domain\Entities\LiveBlogsMedia", mappedBy="liveBlog",
     *     cascade={"persist"})
     */
    private Collection $liveBlogMedias;
    
    
    /**
     * @var \App\Domain\ValueObject\LiveBlog\Video
     * @ORM\Embedded(class="\App\Domain\ValueObject\LiveBlog\Video", columnPrefix=false)
     */
    private Video $video;
    
    /**
     * @var \App\Domain\ValueObject\Slug
     * @ORM\Embedded(class="\App\Domain\ValueObject\Slug", columnPrefix=false)
     */
    private Slug $slug;
    
    /**
     * LiveBlog constructor.
     *
     * @param \Ramsey\Uuid\UuidInterface                   $id
     * @param \App\Domain\ValueObject\Name                 $name
     * @param \App\Domain\ValueObject\LiveBlog\Description $description
     * @param \DateTimeImmutable                           $published_at
     * @param \App\Domain\Entities\Building                $building
     * @param \App\Domain\ValueObject\LiveBlog\Video       $video
     * @param \App\Domain\ValueObject\Slug                 $slug
     */
    #[Pure]
    private function __construct(
        UuidInterface $id,
        Name $name,
        Description $description,
        DateTimeImmutable $published_at,
        Building $building,
        Video $video,
        Slug $slug
    )
    {
        parent::__construct($id);
        $this->name           = $name;
        $this->description    = $description;
        $this->published_at   = $published_at;
        $this->building       = $building;
        $this->liveBlogMedias = new ArrayCollection();
        $this->video          = $video;
        $this->slug           = $slug;
    }
    
    /**
     * @param \Ramsey\Uuid\UuidInterface                   $id
     * @param \App\Domain\ValueObject\Name                 $name
     * @param \App\Domain\ValueObject\LiveBlog\Description $description
     * @param \DateTimeImmutable                           $published_at
     * @param \App\Domain\Entities\Building                $building
     * @param \App\Domain\ValueObject\LiveBlog\Video       $video
     * @param \App\Domain\ValueObject\Slug                 $slug
     *
     * @return static
     */
    #[Pure]
    public static function create(
        UuidInterface $id,
        Name $name,
        Description $description,
        DateTimeImmutable $published_at,
        Building $building,
        Video $video,
        Slug $slug
    ): static
    {
        return new static(
            $id,
            $name,
            $description,
            $published_at,
            $building,
            $video,
            $slug
        );
    }
    
    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id'           => $this->id,
            'name'         => $this->name->names(),
            'description'  => $this->description->description(),
            'published_at' => Carbon::make($this->published_at),
            'building'     => $this->building,
            'images'       => $this->liveBlogMedias->toArray(),
            'videos'       => $this->video->videos(),
            'slug'         => $this->slug->slug(),
            'created_at'   => Carbon::make($this->created_at),
            'updated_at'   => Carbon::make($this->updated_at),
        ];
    }
    
    /**
     * @param \App\Domain\Entities\LiveBlogsMedia $media
     *
     * @return $this
     */
    public function addMedia(LiveBlogsMedia $media): static
    {
        $this->liveBlogMedias->add($media);
        
        return $this;
    }
    
    /**
     * @return \App\Domain\Entities\Building
     */
    public function getBuilding(): Building
    {
        return $this->building;
    }
    
    /**
     * @param \App\Domain\ValueObject\Name                 $name
     * @param \DateTimeImmutable                           $publishedAt
     * @param \App\Domain\ValueObject\LiveBlog\Description $description
     * @param \App\Domain\Entities\Building                $building
     * @param \App\Domain\ValueObject\LiveBlog\Video       $video
     *
     * @return $this
     */
    public function update(
        Name $name,
        DateTimeImmutable $publishedAt,
        Description $description,
        Building $building,
        Video $video
    ): static
    {
        $this->name         = $name;
        $this->building     = $building;
        $this->description  = $description;
        $this->published_at = $publishedAt;
        $this->video        = $video;
        
        return $this;
    }
    
    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection
     */
    public function getLiveBlogMedias(): ArrayCollection|Collection
    {
        
        return $this->liveBlogMedias;
    }
    
}