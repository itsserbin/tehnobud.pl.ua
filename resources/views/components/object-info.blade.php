@php
    /* @var \App\ReadModels\Building $building */
@endphp
<div class="description p-3 border position-relative">
    <h3 class="description-title">
        {{$building->name}}
    </h3>
    <div class="description-subtitle" itemprop="description">
        {!! $building->description !!}
    </div>

</div>
