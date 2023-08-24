<?php

namespace App\Http\Controllers\Api\Admin;

use App\Domain\Entities\LiveBlog as LiveBlogEntity;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\DeleteMassRequest;
use App\Http\Requests\Api\Admin\LiveBlog\CreateLiveBlogRequest;
use App\Http\Requests\Api\Admin\LiveBlog\UpdateLiveBlogRequest;
use App\Http\Requests\Search\LiveBlogFilterRequest;
use App\Queries\LiveBlog\Contract\LiveBlogQuery;
use App\ReadModels\LiveBlog as LiveBlogReadModel;
use App\Services\LiveBlog\LiveBlogService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Ramsey\Uuid\Uuid;

/**
 * Class LiveBlogController
 *
 * @package App\Http\Controllers\Api\Admin
 */
class LiveBlogController extends Controller
{
    
    /**
     * LiveBlogController constructor.
     *
     * @param   \App\Services\LiveBlog\LiveBlogService  $liveBlogService
     * @param   \App\Queries\LiveBlog\Contract\LiveBlogQuery  $liveBlogQuery
     */
    public function __construct(
        private LiveBlogService $liveBlogService,
        private LiveBlogQuery $liveBlogQuery
    ) {
    }
    
    /**
     * Display a listing of the resource.
     *
     * @param   \App\Http\Requests\Search\LiveBlogFilterRequest  $request
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(LiveBlogFilterRequest $request): LengthAwarePaginator
    {
        return $this->liveBlogQuery->getAll($request->getDto());
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Api\Admin\LiveBlog\CreateLiveBlogRequest $request
     *
     * @return LiveBlogEntity
     * @throws \Exception
     */
    public function store(CreateLiveBlogRequest $request): LiveBlogEntity
    {
        return $this->liveBlogService->create(
            Uuid::uuid4(),
            $request->getDto()
        );
    }
    
    /**
     * Display the specified resource.
     *
     * @param   string  $id
     *
     * @return LiveBlogReadModel
     */
    public function show(string $id): LiveBlogReadModel
    {
        return $this->liveBlogQuery->getOne(Uuid::fromString($id));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Api\Admin\LiveBlog\UpdateLiveBlogRequest $request
     * @param string                                                      $id
     *
     * @return \App\Domain\Entities\LiveBlog
     * @throws \Exception
     */
    public function update(
        UpdateLiveBlogRequest $request,
        string $id
    ): LiveBlogEntity {
        return $this->liveBlogService->update(
            Uuid::fromString($id),
            $request->getDto()
        );
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param   string  $id
     *
     * @return \App\Domain\Entities\LiveBlog
     */
    public function destroy(string $id): LiveBlogEntity
    {
        return $this->liveBlogService->destroy(Uuid::fromString($id));
    }
    
    /**
     * @param \App\Http\Requests\Api\Admin\DeleteMassRequest $request
     *
     * @return array
     */
    public function deleteMass(DeleteMassRequest $request): array
    {
        return $this->liveBlogService->deleteMass($request->getDto());
    }
}
