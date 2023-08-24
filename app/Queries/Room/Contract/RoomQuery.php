<?php

namespace App\Queries\Room\Contract;

use App\ReadModels\Room;
use App\Services\Dto\Room\SearchRoomDto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Ramsey\Uuid\UuidInterface;

/**
 * Interface RoomQuery
 *
 * @package App\Queries\Room\Contract
 */
interface RoomQuery
{
    
    /**
     * @param   \App\Services\Dto\Room\SearchRoomDto  $dto
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll(SearchRoomDto $dto): LengthAwarePaginator;
    
    /**
     * @param   \Ramsey\Uuid\UuidInterface  $id
     *
     * @return \App\ReadModels\Room
     */
    public function getOne(UuidInterface $id): Room;
    
}