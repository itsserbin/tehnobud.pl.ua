<?php
/** @noinspection DoctrineTypeDeprecatedInspection */

declare(strict_types=1);

namespace App\Domain\ValueObject;

use Doctrine\ORM\Mapping as ORM;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Immutable;

/**
 * Class Slug
 *
 * @package App\Domain\ValueObject
 * @ORM\Embeddable
 * @psalm-immutable
 */
#[Immutable]
final class Slug
{

    /**
     * @var array<array-key, string>
     * @ORM\Column(type="json")
     */
    #[ArrayShape([
        'ru' => 'string', 'ua' => 'string',
    ])]
    private array $slug;

    /**
     * Slug constructor.
     *
     * @param  array<array-key, string>  $slug
     */
    private function __construct(array $slug)
    {
        $this->slug = array_map(static fn(string $value) => Str::slug($value),
            $slug);
    }

    /**
     * @param  array  $slug
     *
     * @return \App\Domain\ValueObject\Slug
     */
    public static function create(
        array $slug
    ): Slug {
        return new self($slug);
    }

    /**
     * @return array
     */
    #[ArrayShape(['ru' => "string", 'ua' => "string"])]
    public function slug(): array
    {
        return $this->slug;
    }

    /**
     * @param  \App\Domain\ValueObject\Slug  $other
     *
     * @return bool
     */
    public function equal(self $other): bool
    {
        return $this->slug['ua'] === $other->slug['ua']
               && $this->slug['ru'] === $other->slug['ru'];
    }

}