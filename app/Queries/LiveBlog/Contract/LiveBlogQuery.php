<?php

namespace App\Queries\LiveBlog\Contract;

use App\ReadModels\LiveBlog;
use App\Services\Dto\LiveBlog\SearchLiveBlogDto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Ramsey\Uuid\UuidInterface;

/**
 * Interface LiveBlogQuery
 *
 * @package App\Queries\LiveBlog\Contract
 */
interface LiveBlogQuery
{
    
    /**
     * @param \App\Services\Dto\LiveBlog\SearchLiveBlogDto $dto
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll(SearchLiveBlogDto $dto): LengthAwarePaginator;
    
    /**
     * @param \Ramsey\Uuid\UuidInterface $id
     *
     * @return \App\ReadModels\LiveBlog
     */
    public function getOne(UuidInterface $id): LiveBlog;
    
    /**
     * @param string $slug_building
     * @param string $slug_new
     * @param string $locale
     *
     * @return mixed
     */
    public function getBySlug(string $slug_building, string $slug_new, string $locale);
}