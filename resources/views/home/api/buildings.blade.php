@php
    /* @var \App\ReadModels\Building[]|\Illuminate\Support\Collection $buildings */
@endphp

@foreach($buildings as $building)
    @include('components.item', ['building' => $building])
@endforeach
