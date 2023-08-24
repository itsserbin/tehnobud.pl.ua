<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\Building;

use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Immutable;
use JetBrains\PhpStorm\Pure;

/**
 * Class Status
 *
 * @package App\Domain\ValueObject\Building
 * @ORM\Embeddable
 * @psalm-immutable
 */
#[Immutable]
final class Status
{

    /**
     * @var array<array-key, string>
     * @ORM\Column(type="json")
     */
    #[ArrayShape([
        'ru' => 'string',
        'ua' => 'string',
    ])]
    private array $status;

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     */
    private ?string $statusColor;
    
    
    /**
     * Status constructor.
     *
     * @param   array  $status
     * @param   string|null  $statusCode
     */
    private function __construct(array $status, ?string $statusCode)
    {
        $this->status = $status;
        $this->statusColor = $statusCode;
    }
    
    /**
     * @param   array  $status
     * @param   string|null  $statusCode
     *
     * @return \App\Domain\ValueObject\Building\Status
     */
    #[Pure]
    public static function create(
        array $status,
        ?string $statusCode
    ): Status {
        return new self(
            $status,
            $statusCode
        );
    }

    /**
     * @return array
     */
    #[ArrayShape([
        'ru' => "string",
        'ua' => "string",
    ])]
    public function getStatus(): array
    {
        return $this->status;
    }

    /**
     * @return string|null
     */
    public function getStatusColor(): ?string
    {
        return $this->statusColor;
    }

}