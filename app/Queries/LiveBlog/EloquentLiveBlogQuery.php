<?php

namespace App\Queries\LiveBlog;

use App\Exceptions\NotFoundException;
use App\Queries\LiveBlog\Contract\LiveBlogQuery;
use App\ReadModels\LiveBlog;
use App\Services\Dto\LiveBlog\SearchLiveBlogDto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Ramsey\Uuid\UuidInterface;

/**
 * Class EloquentLiveBlogQuery
 *
 * @package App\Queries\LiveBlog
 */
class EloquentLiveBlogQuery implements LiveBlogQuery
{
    
    /**
     * @param \App\Services\Dto\LiveBlog\SearchLiveBlogDto $dto
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll(SearchLiveBlogDto $dto): LengthAwarePaginator
    {
        return LiveBlog::filterBuildingId($dto->getBuildingId())
                       ->filterName($dto->getName())
                       ->orderByField($dto->getOrderBy(), $dto->getOrderDirection())
                       ->with('images', 'building')
                       ->paginate();
    }
    
    /**
     * @param \Ramsey\Uuid\UuidInterface $id
     *
     * @return \App\ReadModels\LiveBlog
     */
    public function getOne(UuidInterface $id): LiveBlog
    {
        /* @var LiveBlog $liveBlog */
        $liveBlog = LiveBlog::with('images', 'building')
                            ->where('id', $id)
                            ->first();
        
        if ( ! $liveBlog)
        {
            throw new NotFoundException("Live blog $id not found");
        }
        
        return $liveBlog;
    }
    
    /**
     * @param string $slug_building
     * @param string $slug_new
     * @param string $locale
     *
     * @return LiveBlog
     */
    public function getBySlug(string $slug_building, string $slug_new, string $locale): LiveBlog
    {
        return LiveBlog::where("slug->$locale", $slug_new)
                       ->with(['building', 'images'])
                       ->whereHas(
                           'building',
                           fn(Builder $builder) => $builder
                               ->where("slug->$locale", $slug_building)
                       )
                       ->firstOrFail();
    }
}