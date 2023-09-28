@php
    /* @var \App\ReadModels\Presentation $presentation */
@endphp

<div class="pdf pt-5">
    <h3 class="pdf-title">
        Презентація об’єкту в PDF:
    </h3>
    <div class="pdf-wrapper mt-4">
        <div class="row pdf-wrapper-btn justify-content-around align-items-center position-relative">
            <div class="col-12 d-md-none">
                <div class="pseudo-img"
                     style="background-image: url({{ $presentation->photo ?? asset('assets/images/img/book-pdf.png') }})"></div>
            </div>
            <div class="col-12 col-md-4">
                <a type="button" class="btn btn-primary px-4 w-100 text-uppercase primary-hover position-relative"
                   rel="nofollow" target="_blank" href="{{$presentation->pdf}}">
                     <span>
                         {{__('home.button.download')}}
                     </span>
                </a>
            </div>
            <div class="col-12 col-md-4 d-none d-md-block">
                <img loading="lazy" class="pdf-book position-absolute"
                     src="{{ $presentation->photo ?? asset('assets/images/img/book-pdf.png') }}" alt="">
                <img loading="lazy" class="diagonal-black position-absolute" src="{{ asset('assets/images/img/diagonal-black.png') }}"
                     alt="">
            </div>
        </div>
    </div>
</div>
