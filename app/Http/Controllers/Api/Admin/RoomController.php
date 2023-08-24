<?php

namespace App\Http\Controllers\Api\Admin;

use App\Domain\Entities\Room as RoomEntity;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\DeleteMassRequest;
use App\Http\Requests\Api\Admin\Room\CreateRoomRequest;
use App\Http\Requests\Api\Admin\Room\UpdateRoomRequest;
use App\Http\Requests\Search\RoomFilterRequest;
use App\Queries\Room\Contract\RoomQuery;
use App\ReadModels\Room as RoomReadModel;
use App\Services\Room\RoomService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Ramsey\Uuid\Uuid;

/**
 * Class RoomController
 *
 * @package App\Http\Controllers\Api\Admin
 */
class RoomController extends Controller {
    
    /**
     * RoomController constructor.
     *
     * @param \App\Services\Room\RoomService       $roomService
     * @param \App\Queries\Room\Contract\RoomQuery $roomQuery
     */
    public function __construct(
        private RoomService $roomService,
        private RoomQuery $roomQuery
    ) {
    }
    
    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Requests\Search\RoomFilterRequest $request
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(RoomFilterRequest $request): LengthAwarePaginator
    {
        
        return $this->roomQuery->getAll($request->getDto());
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Api\Admin\Room\CreateRoomRequest $request
     *
     * @return RoomEntity
     */
    public function store(CreateRoomRequest $request): RoomEntity
    {
        
        return $this->roomService->create(
            Uuid::uuid4(),
            $request->getDto()
        );
    }
    
    /**
     * Display the specified resource.
     *
     * @param string $id
     *
     * @return RoomReadModel
     */
    public function show(string $id): RoomReadModel
    {
        
        return $this->roomQuery->getOne(Uuid::fromString($id));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Api\Admin\Room\UpdateRoomRequest $request
     * @param string                                              $id
     *
     * @return \App\Domain\Entities\Room
     */
    public function update(
        UpdateRoomRequest $request,
        string $id
    ): RoomEntity {
        
        return $this->roomService->update(
            Uuid::fromString($id),
            $request->getDto()
        );
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     *
     * @return RoomEntity
     */
    public function destroy(string $id): RoomEntity
    {
        
        return $this->roomService->destroy(Uuid::fromString($id));
    }
    
    /**
     * @param \App\Http\Requests\Api\Admin\DeleteMassRequest $request
     *
     * @return array
     */
    public function deleteMass(DeleteMassRequest $request): array
    {
        
        return $this->roomService->deleteMass($request->getDto());
    }
}
