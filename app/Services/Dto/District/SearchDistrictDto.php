<?php

declare(strict_types=1);

namespace App\Services\Dto\District;


use Ramsey\Uuid\UuidInterface;

/**
 * Class SearchDistrictDto
 *
 * @package App\Services\Dto\District
 */
final class SearchDistrictDto
{

    /**
     * SearchDistrictDto constructor.
     *
     * @param  string|null  $name
     * @param  \Ramsey\Uuid\UuidInterface|null  $city
     * @param  string|null  $order_by
     * @param  string|null  $order_direction
     * @param  int|null  $per_page
     */
    public function __construct(
        private ?string $name = null,
        private ?UuidInterface $city = null,
        private ?string $order_by = null,
        private ?string $order_direction = null,
        private ?int $per_page = null,
    ) {
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return \Ramsey\Uuid\UuidInterface|null
     */
    public function getCity(): ?UuidInterface
    {
        return $this->city;
    }

    /**
     * @return string|null
     */
    public function getOrderBy(): ?string
    {
        return $this->order_by;
    }

    /**
     * @return string|null
     */
    public function getOrderDirection(): ?string
    {
        return $this->order_direction;
    }

    /**
     * @return int|null
     */
    public function getPerPage(): ?int
    {
        return $this->per_page;
    }

}