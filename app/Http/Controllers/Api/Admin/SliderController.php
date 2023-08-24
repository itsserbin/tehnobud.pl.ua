<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\DeleteMassRequest;
use App\Http\Requests\Api\Admin\Slider\SliderCreateRequest;
use App\Http\Requests\Api\Admin\Slider\UpdatePhotoSliderRequest;
use App\Http\Requests\SliderFilterRequest;
use App\Queries\Slider\Contract\SliderQuery;
use App\ReadModels\Slider;
use App\Services\Slider\SliderServices;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Ramsey\Uuid\Uuid;

class SliderController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Requests\SliderFilterRequest   $request
     * @param \App\Queries\Slider\Contract\SliderQuery $query
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(
        SliderFilterRequest $request,
        SliderQuery $query
    ): LengthAwarePaginator
    {
        return $query->getAll($request->getDto());
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Api\Admin\Slider\SliderCreateRequest $request
     * @param \App\Services\Slider\SliderServices                     $sliderServices
     * @param string                                                  $building_id
     *
     * @return array
     */
    public function store(
        SliderCreateRequest $request,
        SliderServices $sliderServices,
        string $building_id
    ): array {
        return $sliderServices->create(
            $request->getDto(),
            Uuid::fromString($building_id)
        );
    }
    
    /**
     * Display the specified resource.
     *
     * @param \App\Queries\Slider\Contract\SliderQuery $query
     * @param string                                   $id
     *
     * @return \App\ReadModels\Slider
     */
    public function show(
        SliderQuery $query,
        string $id
    ): Slider
    {
        return $query->getOne(Uuid::fromString($id));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Services\Slider\SliderServices $sliderServices
     * @param string                              $id
     *
     * @return \App\Domain\Entities\Slider
     */
    public function destroy(
        SliderServices $sliderServices,
        string $id
    ): \App\Domain\Entities\Slider
    {
        return $sliderServices->destroy(Uuid::fromString($id));
    }
    
    /**
     * @param \App\Http\Requests\Api\Admin\DeleteMassRequest $request
     * @param \App\Services\Slider\SliderServices            $sliderServices
     *
     * @return array
     */
    public function deleteMass(DeleteMassRequest $request, SliderServices $sliderServices): array
    {
        return $sliderServices->deleteMass($request->getDto());
    }
    
    /**
     * @param \App\Http\Requests\Api\Admin\Slider\UpdatePhotoSliderRequest $request
     * @param \App\Services\Slider\SliderServices                          $sliderServices
     * @param string                                                       $id
     *
     * @return \App\Domain\Entities\Slider
     */
    public function updatePhoto(UpdatePhotoSliderRequest $request, SliderServices $sliderServices, string $id): \App\Domain\Entities\Slider
    {
        return $sliderServices->update(Uuid::fromString($id), $request->getDto());
    }
}
