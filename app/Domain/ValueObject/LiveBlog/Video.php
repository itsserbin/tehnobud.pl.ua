<?php

namespace App\Domain\ValueObject\LiveBlog;

use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

/**
 * Class Video
 *
 * @package App\Domain\ValueObject\LiveBlog
 * @ORM\Embeddable
 */
final class Video
{
    
    /**
     * @var string[]
     * @ORM\Column(type="json", name="videos")
     */
    private array $videos;
    
    
    /**
     * Video constructor.
     *
     * @param   array  $videos
     */
    private function __construct(array $videos)
    {
        $this->videos = $videos;
    }
    
    /**
     * @param   array  $videos
     *
     * @return \App\Domain\ValueObject\LiveBlog\Video
     */
    #[Pure]
    public static function create(
        array $videos
    ): Video {
        return new Video($videos);
    }
    
    /**
     * @return string[]
     */
    public function videos(): array
    {
        return $this->videos;
    }
    
}