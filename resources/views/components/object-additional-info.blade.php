@php
    /* @var \App\ReadModels\Building $building */
@endphp
@if(!empty($building->additional_information))
<div class="additional-info pt-5">
    <h3 class="additional-info-title text-uppercase">
        Додаткова інформація
    </h3>
    <ul class="list-info list-inline mt-4">
        @foreach($building->additional_information as $item)
            <li>{{$item}}</li>
        @endforeach
    </ul>
</div>
@endif
