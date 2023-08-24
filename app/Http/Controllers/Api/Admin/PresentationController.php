<?php

namespace App\Http\Controllers\Api\Admin;

use App\Domain\Entities\Presentation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\DeleteMassRequest;
use App\Http\Requests\Api\Admin\Presentation\CreatePresentationRequest;
use App\Http\Requests\Api\Admin\Presentation\UpdatePresentationRequest;
use App\Queries\Presentation\Contract\PresentationQuery;
use App\Services\Presentation\PresentationServices;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Ramsey\Uuid\Uuid;

class PresentationController extends Controller {
    
    public function __construct(
        private PresentationServices $presentationServices,
        private PresentationQuery $presentationQuery
    ) {
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        
        return $this->presentationQuery->getAll();
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Api\Admin\Presentation\CreatePresentationRequest $request
     *
     * @return \App\Domain\Entities\Presentation
     */
    public function store(
        CreatePresentationRequest $request,
    ): Presentation {
        
        return $this->presentationServices->create(
            Uuid::uuid4(),
            $request->getDto()
        );
    }
    
    /**
     * Display the specified resource.
     *
     * @param string $id
     *
     * @return \App\ReadModels\Presentation
     */
    public function show(string $id): \App\ReadModels\Presentation
    {
        
        return $this->presentationQuery->getOne(Uuid::fromString($id));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     *
     * @return \App\Domain\Entities\Presentation
     */
    public function destroy(string $id): Presentation
    {
        
        return $this->presentationServices->destroy(Uuid::fromString($id));
    }
    
    /**
     * @param \App\Http\Requests\Api\Admin\DeleteMassRequest $request
     *
     * @return array
     */
    public function deleteMass(DeleteMassRequest $request): array
    {
        
        return $this->presentationServices->deleteMass($request->getDto());
    }
    
    /**
     * @param \App\Http\Requests\Api\Admin\Presentation\UpdatePresentationRequest $request
     * @param string                                                              $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdatePresentationRequest $request, string $id): JsonResponse
    {
        
        return response()->json(
            $this->presentationServices->update(
                Uuid::fromString($id),
                $request->getDto()
            )
        );
    }
}
