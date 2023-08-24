<?php
declare(strict_types=1);

namespace App\Domain\Entities;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use Ramsey\Uuid\UuidInterface;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class EntityWithId
 *
 * @package App\Domain\Entity
 */
abstract class EntityWithId implements JsonSerializable
{
    
    /**
     * @var \Ramsey\Uuid\UuidInterface
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected UuidInterface $id;
    
    /**
     * @var \DateTimeImmutable|null
     * @ORM\Column(type="datetime_immutable", nullable=true)
     * @Gedmo\Timestampable(on="create")
     */
    protected ?DateTimeImmutable $created_at;
    
    /**
     * @var \DateTimeImmutable|null
     * @ORM\Column(type="datetime_immutable", nullable=true)
     * @Gedmo\Timestampable(on="update")
     */
    protected ?DateTimeImmutable $updated_at;
    
    /**
     * EntityWithId constructor.
     *
     * @param \Ramsey\Uuid\UuidInterface $id
     */
    protected function __construct(UuidInterface $id)
    {
        $this->id   = $id;
        $created_at = null;
        $updated_at = null;
    }
    
    /**
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }
}