@php
    /* @var \App\ReadModels\Building $building */
@endphp
<div class="character pt-5">
    <h3 class="character-title text-uppercase">
        @lang('object.character.title')
    </h3>
    <table class="table">
        <tbody>
        <tr class="row">
            <td class="col-6 col-lg-3">@lang('object.character.started_at'):</td>
            <th class="col-6 col-lg-3"
                scope="row">{{$building->started_at ? $building->started_at?->format('d-m-Y'): '-'}}</th>
            <td class="col-6 col-lg-3">@lang('object.character.ended_at'):</td>
            <th class="col-6 col-lg-3"
                scope="row">{{$building->ended_at ? $building->ended_at->format('d-m-Y'): '-'}}</th>
        </tr>
        <tr class="row">
            <td class="col-6 col-lg-3">@lang('object.character.material'):</td>
            <th class="col-6 col-lg-3" scope="row">{{$building->material ?: '-'}}</th>
            <td class="col-6 col-lg-3">@lang('object.character.heating'):</td>
            <th class="col-6 col-lg-3" scope="row">{{$building->heating ?: '-'}}</th>
        </tr>
        <tr class="row">
            <td class="col-6 col-lg-3">@lang('object.character.status'):</td>
            <th class="col-6 col-lg-3" scope="row">{{$building->status ?: '-'}}</th>
            <td class="col-6 col-lg-3">@lang('object.character.price'):</td>
            <th class="col-6 col-lg-3" scope="row">
                @if($building->price)
                    {{$building->price_format}}$
                @else
                    -
                @endif
            </th>
        </tr>
        <tr class="row">
            <td class="col-6 col-lg-3">@lang('object.character.floors'):</td>
            <th class="col-6 col-lg-3" scope="row">{{$building->floors ?: '-'}}</th>
            <td class="col-6 col-lg-3">@lang('object.character.total_area'):</td>
            <th class="col-6 col-lg-3" scope="row">{{$building->total_area ? $building->total_area . 'м2': '-'}}</th>
        </tr>
        <tr class="row">
            <td class="col-6 col-lg-3">@lang('object.character.parking'):</td>
            <th class="col-6 col-lg-3"
                scope="row">{{$building->parking ? __('object.character_value.parking') : '-'}}</th>
            <td class="col-6 col-lg-3">@lang('object.character.view'):</td>
            <th class="col-6 col-lg-3" scope="row">{{$building->view ?: '-'}}</th>
        </tr>
        </tbody>
    </table>
</div>

