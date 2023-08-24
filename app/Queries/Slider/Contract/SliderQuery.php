<?php

namespace App\Queries\Slider\Contract;

use App\ReadModels\Slider;
use App\Services\Dto\Slider\SearchSliderDto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Ramsey\Uuid\UuidInterface;

interface SliderQuery
{
    
    public function getAll(SearchSliderDto $dto): LengthAwarePaginator;
    
    public function getOne(UuidInterface $id): Slider;
    
}