<?php

declare(strict_types=1);

namespace App\Queries\Building\Contract;

use App\ReadModels\Building;
use App\Services\Dto\Building\SearchBuildingDto;
use App\Services\Localization\LocalizationHandle;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use JetBrains\PhpStorm\ExpectedValues;
use Ramsey\Uuid\UuidInterface;

/**
 * Interface BuildingQuery
 *
 * @package App\Queries\Building\Contract
 */
interface BuildingQuery
{
    
    /**
     * @param \App\Services\Dto\Building\SearchBuildingDto $dto
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll(SearchBuildingDto $dto): LengthAwarePaginator;
    
    /**
     * @param \Ramsey\Uuid\UuidInterface $id
     *
     * @return \App\ReadModels\Building
     */
    public function getById(UuidInterface $id): Building;
    
    /**
     * @param \App\Services\Dto\Building\SearchBuildingDto $dto
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllToSite(SearchBuildingDto $dto): LengthAwarePaginator;
    
    /**
     * @param string $slug
     * @param string $lang
     *
     * @return mixed
     */
    public function getBySlug(string $slug, #[ExpectedValues(LocalizationHandle::LANGUAGES)] string $lang): Building;
}