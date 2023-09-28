@php
/* @var \App\ReadModels\Slider[] $sliders */
@endphp

<div class="col-5 wrapper-slider position-absolute d-none d-xl-block">
    <div class="object-slider">
        @foreach($sliders as $slider)
            @include('components.slider-item', ['slider' => $slider])
        @endforeach
    </div>
    <img loading="lazy" class="diagonal position-absolute" src="{{ asset('assets/images/img/diagonal.png') }}" alt="">
</div>

<div class="col-12 wrapper-slider mobile-slider d-block d-xl-none">
    <div class="object-slider">
        @foreach($sliders as $slider)
            @include('components.slider-item', ['slider' => $slider])
        @endforeach
    </div>
</div>
