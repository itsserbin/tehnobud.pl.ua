@php
    /* @var \App\ReadModels\Plan[]|\Illuminate\Support\Collection $plans */
@endphp
<script type="text/javascript" src="{{asset('assets/js/map/jquery14.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/map/jquery.MetaData.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/map/jquery.maphilight.min.js')}}"></script>

<div class="wrapper-items">
    <h3 class="text-uppercase text-center name-rooms">{{$plans->first()->name}}</h3>
    <div class="row mt-5">
        <div class="col-12 col-xl-8 wrapper-buildings">
            @foreach($plans as $plan)
                <div class="one-product-layout__desktop wrapper-plans w-100 @if(!$loop->first) d-none @endif"
                     data-housing="{{$plan->id}}">
                    <div
                            style='display: block; background-image: url("{{$plan->plan}}"); position: relative; padding: 0;
                                    width: 1200px; height: 700px; background-repeat: no-repeat'>
                        <canvas
                                style="width: 1200px; height: 700px; position: absolute; left: 0; top: 0; padding: 0;
                                 border: 0; opacity: 1;"
                                height="700" width="1200"></canvas>
                        <img loading="lazy" src="{{ $plan->plan }}" alt="{{$plan->name}}"
                             style="max-width: unset; opacity: 0; position: absolute; left: 0; top: 0;
                                                                      padding: 0; border: 0;"
                             usemap="#Map-{{$plan->id}}" class="maphilighted">
                    </div>

                    <map name="Map-{{$plan->id}}" id="Map-{{$plan->id}}" class="wrapper-map">
                        @foreach($plan->rooms as $room)
                            <area rel="lightbox5"
                                  class="lightbox_related_video3 {'strokeColor':'e91e63','strokeWidth':2,'fillColor':'{{!$room->is_sale ? trim($room->color, '#') : '757575'}}','fillOpacity':0.6} cboxElement"
                                  alt="Координаты" title="Координаты"
                                  href="#rooms-{{$plan->id}}-{{$room->number_room}}" shape="poly"
                                  coords="{{$room->coordinate}}">
                        @endforeach
                    </map>
                </div>
            @endforeach
        </div>
        <div class="col-12 col-xl-4 mt-5 mt-xl-0">
            <h4 class="text-uppercase fw-bold">{{__('object.plan.apartment')}}</h4>
            @foreach($plans as $plan)
                <div class="apartments">
                    <ul class="list-unstyled wrapper-apartment @if(!$loop->first) d-none @endif" data-rooms="{{$plan->id}}">
                        @foreach($plan->rooms as $room)
                            <li>
                                <div class="row justify-content-between py-2">
                                    <div class="col-6">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-6">
                                                <div
                                                        class="color-box @if($room->is_sale) grey @endif"
                                                        @if(!$room->is_sale) style="background-color: {{$room->color}}" @endif
                                                ></div>
                                            </div>
                                            <div class="col-6">
                                                <span class="number-apartment">{{str_pad($room->number_room, 2, "0", STR_PAD_LEFT)}}.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <p>
                                            {{$room->name}} {{$room->area}}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row mt-5">
        @foreach($plans as $plan)
            <div class="col-4">
                <div class="border object-line" data-counter="{{$plan->id}}" data-name="{{$plan->name}}">
                    <img loading="lazy" class="w-100" src="{{ $plan->plan }}" alt="">
                </div>
                <p class="text-center">{{$plan->name}}</p>
            </div>
        @endforeach
    </div>

    <div style="display:none;">
        @foreach($plans as $plan)
            @foreach($plan->rooms as $room)
                <div rel="lightbox5" id="rooms-{{$plan->id}}-{{$room->number_room}}" class="layout-modal-content">
                    <img loading="lazy" src="{{$room->photo}}" title="Координаты" alt="{{$room->name}}">
                    {{--            <a class="one-product-layout__print-btn" href="#"--}}
                    {{--               onclick="window.open('{{localUrl("print/room/$layoutCoordinate->id")}}', 'myWindow',--}}
                    {{--                   'status = 1,  width = 820' )">Печать</a>--}}
                </div>
            @endforeach
        @endforeach

    </div>
</div>

<script type="text/javascript">
    $('img[usemap]').maphilight();
</script>
