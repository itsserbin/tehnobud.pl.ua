<?php

namespace App\Http\Controllers\Api\Site;

use App\Http\Controllers\Controller;
use App\Queries\District\Contract\DistrictQuery;
use Illuminate\Support\Collection;
use Ramsey\Uuid\Uuid;

/**
 * Class DistrictController
 *
 * @package App\Http\Controllers\Api\Site
 */
class DistrictController extends Controller
{
    
    /**
     * DistrictController constructor.
     *
     * @param \App\Queries\District\Contract\DistrictQuery $districtQuery
     */
    public function __construct(
        private DistrictQuery $districtQuery
    ) {
    }
    
    /**
     * @param string $city_id
     *
     * @return \Illuminate\Support\Collection
     */
    public function getByCityId(string $city_id): Collection
    {
        
        if ($city_id === 'undefined'){
            abort(404);
        }
        
        return $this->districtQuery->getByCityId(Uuid::fromString($city_id));
    }
}
