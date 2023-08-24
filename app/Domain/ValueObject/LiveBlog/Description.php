<?php

namespace App\Domain\ValueObject\LiveBlog;

use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class Description
 *
 * @package App\Domain\ValueObject\LiveBlog
 * @ORM\Embeddable
 */
final class Description
{
    
    /**
     * @var array
     * @ORM\Column(type="json")
     */
    #[ArrayShape([
        'ru' => 'string',
        'ua' => 'string',
    ])]
    private array $description;
    
    
    /**
     * Name constructor.
     *
     * @param   array  $description
     */
    private function __construct(array $description)
    {
        if ( ! isset($description['ru'], $description['ua']))
        {
            throw new InvalidArgumentException("Name invalid");
        }
        $this->description = $description;
    }
    
    /**
     * @return array
     */
    #[ArrayShape(['ru' => "string", 'ua' => "string"])]
    public function description(): array
    {
        return $this->description;
    }
    
    /**
     * @param   array  $description
     *
     * @return \App\Domain\ValueObject\LiveBlog\Description
     */
    public static function create(
        array $description
    ): Description {
        return new self($description);
    }
    
    /**
     * @param   \App\Domain\ValueObject\LiveBlog\Description  $other
     *
     * @return bool
     */
    public function equal(self $other): bool
    {
        return $this->description['ru'] === $other->description['ru']
               && $this->description['ua'] === $other->description['ua'];
    }
    
}