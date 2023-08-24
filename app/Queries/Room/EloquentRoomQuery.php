<?php

namespace App\Queries\Room;

use App\Exceptions\NotFoundException;
use App\Queries\Room\Contract\RoomQuery;
use App\ReadModels\Room;
use App\Services\Dto\Room\SearchRoomDto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Ramsey\Uuid\UuidInterface;

/**
 * Class EloquentRoomQuery
 *
 * @package App\Queries\Room
 */
class EloquentRoomQuery implements RoomQuery
{
    
    public function getAll(SearchRoomDto $dto): LengthAwarePaginator
    {
        return Room::filterName($dto->getName())
            ->orderByField($dto->getOrderBy(), $dto->getOrderDirection())
            ->when(
                $dto->getPlanId(),
                fn (Builder $builder) => $builder->where(
                    'plan_id',
                    $dto->getPlanId()
                )
            )
            ->with('plan', 'plan.building')
            ->paginate($dto->getPerPage());
    }
    
    public function getOne(UuidInterface $id): Room
    {
        /* @var Room $room */
        $room = Room::with('plan', 'plan.building')
            ->where(
                'id',
                $id
            )
            ->first();
        
        if ( ! $room)
        {
            throw new NotFoundException("Room $id not found");
        }
        
        return $room;
    }
    
}