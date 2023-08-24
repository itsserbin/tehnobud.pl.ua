@php
    /* @var \App\ReadModels\Building $building */
    /* @var string $url */
@endphp

@extends('layout', ['url' => $url])

@section('content')
    <section class="object bg-light" itemscope itemtype="http://schema.org/Product">
        <div class="container-fluid object-container">
            <div class="container-fluid object-container-mobile">
                <div class="row flex-column-reverse flex-xl-row">
                    <div class="col-12 col-xl-10 bg-light pt-5 wrapper-description">
                        <div class="row d-block d-xl-none mb-4">
                            <div class="col-12">
                                <div class="wrapper-button">
                                    <div class="btn-group w-100">
                                        <form class="d-flex w-100">
                                            <button type="button" class="btn btn-primary px-4 py-3 w-100"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#call-back-modal">
                                                <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M15.3 0C16.7912 0 18 1.17525 18 2.625V11.375C18 12.8247 16.7912 14 15.3 14H2.7C1.20883 14 0 12.8247 0 11.375V2.625C0 1.17525 1.20883 0 2.7 0H15.3ZM16.2 2.912L9.59265 8.5335C9.28161 8.79811 8.82995 8.82016 8.49547 8.59966L8.40735 8.5335L1.8 2.91287V11.375C1.8 11.8582 2.20294 12.25 2.7 12.25H15.3C15.7971 12.25 16.2 11.8582 16.2 11.375V2.912ZM14.832 1.75H3.1662L9 6.71233L14.832 1.75Z"
                                                          fill="white"/>
                                                </svg>
                                                {{__('home.button.leave_request')}}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <h2 class="text-uppercase" itemprop="name">{{$building->name}}</h2>
                            </div>
                        </div>
                        <div class="wrapper-address mt-5">
                            <div class="row mb-3">
                                <div class="col">
                                    <span>
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M9 0C10.6569 0 12 1.34315 12 3L12.0001 4.17067C12.3128 4.06014 12.6494 4 13 4H17C18.6569 4 20 5.34315 20 7V17C20 18.6569 18.6569 20 17 20H3C1.34315 20 0 18.6569 0 17V3C0 1.34315 1.34315 0 3 0H9ZM9 2H3C2.44772 2 2 2.44772 2 3V17C2 17.5523 2.44772 18 3 18H10V3C10 2.44772 9.55228 2 9 2ZM17 6H13C12.4477 6 12 6.44772 12 7V18H17C17.5523 18 18 17.5523 18 17V7C18 6.44772 17.5523 6 17 6ZM7 12C7.55228 12 8 12.4477 8 13C8 13.5523 7.55228 14 7 14H5C4.44772 14 4 13.5523 4 13C4 12.4477 4.44772 12 5 12H7ZM16 12C16.5523 12 17 12.4477 17 13C17 13.5523 16.5523 14 16 14H14C13.4477 14 13 13.5523 13 13C13 12.4477 13.4477 12 14 12H16ZM7 8C7.55228 8 8 8.44772 8 9C8 9.55228 7.55228 10 7 10H5C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8H7ZM16 8C16.5523 8 17 8.44772 17 9C17 9.55228 16.5523 10 16 10H14C13.4477 10 13 9.55228 13 9C13 8.44772 13.4477 8 14 8H16ZM7 4C7.55228 4 8 4.44772 8 5C8 5.55228 7.55228 6 7 6H5C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4H7Z"
                                              fill="#4E5DE3"/>
                                    </svg>
                                    </span>
                                    <h4 class="d-inline-block">
                                        {{$building->district->name}}, {{$building->district->city->name}}
                                    </h4>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <span>
                                        <svg width="12" height="14" viewBox="0 0 12 14" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M6 0C9.31371 0 12 2.79001 12 6.23166C12 8.5091 10.1851 10.9171 6.63217 13.5402L6 14L5.61853 13.7236C1.90028 11.0291 0 8.56206 0 6.23166C0 2.79001 2.68629 0 6 0ZM6 1.38481C3.42267 1.38481 1.33333 3.55482 1.33333 6.23166C1.33333 7.9134 2.86448 9.96551 6 12.3073C9.13552 9.96551 10.6667 7.9134 10.6667 6.23166C10.6667 3.55482 8.57733 1.38481 6 1.38481ZM6 2.8C7.47276 2.8 8.66667 4.0536 8.66667 5.6C8.66667 7.1464 7.47276 8.4 6 8.4C4.52724 8.4 3.33333 7.1464 3.33333 5.6C3.33333 4.0536 4.52724 2.8 6 2.8ZM6 4.2C5.26362 4.2 4.66667 4.8268 4.66667 5.6C4.66667 6.3732 5.26362 7 6 7C6.73638 7 7.33333 6.3732 7.33333 5.6C7.33333 4.8268 6.73638 4.2 6 4.2Z"
                                              fill="#4E5DE3"/>
                                    </svg>
                                    </span>
                                    <h4 class="d-inline-block">
                                        {{$building->address}}
                                    </h4>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <span>
                                        <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M1 0H8C8.51284 0 8.93551 0.38604 8.99327 0.883379L9 1V9C9 9.07165 8.9923 9.143 8.97709 9.21281L8.94868 9.31623L6.94868 15.3162C6.82494 15.6874 6.49788 15.9488 6.11604 15.9933L6 16H2C1.35759 16 0.892869 15.4077 1.02037 14.7981L1.05132 14.6838L2.61257 10H1C0.487164 10 0.0644928 9.61396 0.0067277 9.11662L0 9V1C0 0.487164 0.38604 0.0644928 0.883379 0.0067277L1 0H8H1ZM12 0H19C19.5128 0 19.9355 0.38604 19.9933 0.883379L20 1V9C20 9.07165 19.9923 9.143 19.9771 9.21281L19.9487 9.31623L17.9487 15.3162C17.8249 15.6874 17.4979 15.9488 17.116 15.9933L17 16H13C12.3576 16 11.8929 15.4077 12.0204 14.7981L12.0513 14.6838L13.6126 10H12C11.4872 10 11.0645 9.61396 11.0067 9.11662L11 9V1C11 0.487164 11.386 0.0644928 11.8834 0.0067277L12 0H19H12ZM7 2H2V8H4C4.64241 8 5.10713 8.59234 4.97963 9.20188L4.94868 9.31623L3.38743 14H5.27924L7 8.83772V2ZM18 2H13V8H15C15.6424 8 16.1071 8.59234 15.9796 9.20188L15.9487 9.31623L14.3874 14H16.2792L18 8.83772V2Z"
                                              fill="#4E5DE3"/>
                                    </svg>
                                    </span>
                                    <h4 class="d-inline-block">
                                        {{$building->status}}
                                    </h4>
                                </div>
                            </div>
                            @if($building->price)
                                <div class="row mb-3" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                                    <div class="col">
                                    <span>
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M8.54273 0C9.33161 0 10.0882 0.313382 10.646 0.871206L19.1288 9.35399C20.2904 10.5156 20.2904 12.3989 19.1288 13.5605L13.5605 19.1288C12.3989 20.2904 10.5156 20.2904 9.35399 19.1288L0.871206 10.646C0.313382 10.0882 0 9.33161 0 8.54273V2.97448C0 1.33172 1.33172 0 2.97448 0H8.54273ZM8.54273 2H2.97448C2.43629 2 2 2.43629 2 2.97448V8.54273C2 8.80118 2.10267 9.04905 2.28542 9.2318L10.7682 17.7146C11.1488 18.0951 11.7658 18.0951 12.1463 17.7146L17.7146 12.1463C18.0951 11.7658 18.0951 11.1488 17.7146 10.7682L9.2318 2.28542C9.04905 2.10267 8.80118 2 8.54273 2ZM6 4C7.10457 4 8 4.89543 8 6C8 7.10457 7.10457 8 6 8C4.89543 8 4 7.10457 4 6C4 4.89543 4.89543 4 6 4Z"
                                              fill="#4E5DE3"/>
                                    </svg>
                                    </span>
                                    <h4 class="d-inline-block">
                                        <span itemprop="price">{{$building->price_format}}</span>$
                                        <meta itemprop="priceCurrency" content="USD">
                                    </h4>
                                    </div>
                                </div>
                            @endif
                            @if($building->total_area)
                                <div class="row mb-3">
                                    <div class="col">
                                    <span>
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 13L1.11662 13.0067C1.5757 13.0601 1.93995 13.4243 1.99327 13.8834L2 14V18H6L6.11662 18.0067C6.61396 18.0645 7 18.4872 7 19C7 19.5128 6.61396 19.9355 6.11662 19.9933L6 20H1L0.883379 19.9933C0.424297 19.94 0.0600493 19.5757 0.0067277 19.1166L0 19V14L0.0067277 13.8834C0.0600493 13.4243 0.424297 13.0601 0.883379 13.0067L1 13ZM19 13C19.5128 13 19.9355 13.386 19.9933 13.8834L20 14V19C20 19.5128 19.614 19.9355 19.1166 19.9933L19 20H14C13.4477 20 13 19.5523 13 19C13 18.4872 13.386 18.0645 13.8834 18.0067L14 18H18V14C18 13.4872 18.386 13.0645 18.8834 13.0067L19 13ZM6 0C6.55228 0 7 0.447715 7 1C7 1.51284 6.61396 1.93551 6.11662 1.99327L6 2H2V6C2 6.51284 1.61396 6.93551 1.11662 6.99327L1 7C0.487164 7 0.0644928 6.61396 0.0067277 6.11662L0 6V1C0 0.487164 0.38604 0.0644928 0.883379 0.0067277L1 0H6ZM19 0L19.1166 0.0067277C19.5757 0.0600493 19.94 0.424297 19.9933 0.883379L20 1V6L19.9933 6.11662C19.94 6.5757 19.5757 6.93995 19.1166 6.99327L19 7L18.8834 6.99327C18.4243 6.93995 18.06 6.5757 18.0067 6.11662L18 6V2H14L13.8834 1.99327C13.386 1.93551 13 1.51284 13 1C13 0.487164 13.386 0.0644928 13.8834 0.0067277L14 0H19Z"
                                                  fill="#4E5DE3"/>
                                            <path d="M7.6605 12.964H6.3645V7H8.2485L10.0125 11.284L11.7405 7H13.6365V12.964H12.3285V8.476L10.5045 12.964H9.5205L7.6605 8.512V12.964Z"
                                                  fill="#4E5DE3"/>
                                        </svg>

                                    </span>
                                        <h4 class="d-inline-block">
                                            {{$building->total_area}}М<sup><small>2</small></sup>
                                        </h4>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row d-none d-xl-block">
                            <div class="col-4">
                                <div class="wrapper-button">
                                    <div class="btn-group w-100">
                                        <form class="d-flex w-100">
                                            <button type="button" class="btn btn-primary p-4 w-100"
                                                    data-bs-toggle="modal"
                                                    data-name-form="Заявка на объект {{$building->name}}"
                                                    data-bs-target="#call-back-modal">
                                                <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M15.3 0C16.7912 0 18 1.17525 18 2.625V11.375C18 12.8247 16.7912 14 15.3 14H2.7C1.20883 14 0 12.8247 0 11.375V2.625C0 1.17525 1.20883 0 2.7 0H15.3ZM16.2 2.912L9.59265 8.5335C9.28161 8.79811 8.82995 8.82016 8.49547 8.59966L8.40735 8.5335L1.8 2.91287V11.375C1.8 11.8582 2.20294 12.25 2.7 12.25H15.3C15.7971 12.25 16.2 11.8582 16.2 11.375V2.912ZM14.832 1.75H3.1662L9 6.71233L14.832 1.75Z"
                                                          fill="white"/>
                                                </svg>
                                                {{__('home.button.leave_request')}}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('components.object-slider', ['sliders' => $building->sliders])
                </div>
            </div>
        </div>

        <div class="container bg-white object-tabs">
            <ul class="nav nav-tabs d-flex justify-content-between flex-column flex-md-row" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active w-100 py-3" id="home-tab" data-bs-toggle="tab" data-bs-target="#info"
                            type="button" role="tab" aria-controls="info" aria-selected="true">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M12 24C5.37258 24 4.69686e-07 18.6274 1.04907e-06 12C1.62846e-06 5.37258 5.37258 2.78888e-07 12 8.58275e-07C18.6274 1.43766e-06 24 5.37258 24 12C24 18.6274 18.6274 24 12 24ZM12 21.6C17.3019 21.6 21.6 17.3019 21.6 12C21.6 6.69807 17.3019 2.4 12 2.4C6.69807 2.4 2.4 6.69806 2.4 12C2.4 17.3019 6.69807 21.6 12 21.6ZM12 7.2C11.3373 7.2 10.8 6.66274 10.8 6C10.8 5.33726 11.3373 4.8 12 4.8C12.6627 4.8 13.2 5.33726 13.2 6C13.2 6.66274 12.6627 7.2 12 7.2ZM12 19.2C11.3373 19.2 10.8 18.6627 10.8 18L10.8 10.8C10.8 10.1373 11.3373 9.6 12 9.6C12.6627 9.6 13.2 10.1373 13.2 10.8L13.2 18C13.2 18.6627 12.6627 19.2 12 19.2Z"
                                  fill="#777777"/>
                        </svg>
                        <span class="text-uppercase fw-bold mx-4">{{__('object.tabs.info')}}</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link w-100 py-3" id="profile-tab" data-bs-toggle="tab" data-bs-target="#plan"
                            type="button" role="tab" aria-controls="plan" aria-selected="false">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 0C6.6154 0 7.12261 0.463248 7.19193 1.06005L7.2 1.2V16.8H22.8C23.4154 16.8 23.9226 17.2632 23.9919 17.8601L24 18C24 18.6154 23.5368 19.1226 22.9399 19.1919L22.8 19.2H19.2V22.8C19.2 23.4627 18.6627 24 18 24C17.3373 24 16.8 23.4627 16.8 22.8V19.2H6C5.3846 19.2 4.87739 18.7368 4.80807 18.1399L4.8 18V7.2H1.2C0.537258 7.2 0 6.66274 0 6C0 5.33726 0.537258 4.8 1.2 4.8H4.8V1.2C4.8 0.537258 5.33726 0 6 0ZM18 4.8C18.6627 4.8 19.2 5.33726 19.2 6V13.2C19.2 13.8627 18.6627 14.4 18 14.4C17.3373 14.4 16.8 13.8627 16.8 13.2V7.2H10.8C10.1373 7.2 9.6 6.66274 9.6 6C9.6 5.33726 10.1373 4.8 10.8 4.8H18Z"
                                  fill="#777777"/>
                        </svg>
                        <span class="text-uppercase fw-bold mx-4">{{__('object.tabs.plan')}}</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link w-100 py-3" id="contact-tab" data-bs-toggle="tab" data-bs-target="#news"
                            type="button" role="tab" aria-controls="news" aria-selected="false">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.56698 6.76886H11.5274C12.0527 6.76886 12.4785 7.19463 12.4785 7.72C12.4785 8.24533 12.0528 8.67114 11.5274 8.67114H5.56698C5.04133 8.67114 4.61585 8.24538 4.61585 7.72C4.61589 7.19463 5.04166 6.76886 5.56698 6.76886Z"
                                  fill="#777777"/>
                            <path d="M5.57484 11.3659H13.8179C14.3432 11.3659 14.769 11.7917 14.769 12.317C14.769 12.8424 14.3433 13.2682 13.8179 13.2682H5.57484C5.04951 13.2682 4.6237 12.8424 4.6237 12.317C4.6237 11.7917 5.04951 11.3659 5.57484 11.3659Z"
                                  fill="#777777"/>
                            <path d="M0.951139 0.808472H17.786C18.3113 0.808472 18.7372 1.23424 18.7372 1.75961V10.7319H20.4174C22.3929 10.7319 24 12.3393 24 14.3144V19.609C24 21.5845 22.3929 23.1916 20.4174 23.1916C20.2558 23.1916 20.0966 23.1808 19.9409 23.1599H4.24833C1.90603 23.1599 0 21.2541 0 18.9116V1.75961C0 1.23424 0.425764 0.808472 0.951139 0.808472ZM18.7371 19.609C18.7371 20.4241 19.3208 21.1058 20.0921 21.2576H20.4174V21.2893C21.3441 21.2893 22.0977 20.5353 22.0977 19.609V14.3144C22.0977 13.388 21.3438 12.6341 20.4174 12.6341H18.7371V19.609H18.7371ZM1.90223 18.9115C1.90223 20.1832 2.97638 21.2576 4.24833 21.2576H17.2372C16.9801 20.764 16.8349 20.2031 16.8349 19.609V2.71071H1.90223V18.9115Z"
                                  fill="#777777"/>
                            <path d="M5.56698 15.678H11.5274C12.0527 15.678 12.4785 16.1037 12.4785 16.6291C12.4785 17.1544 12.0528 17.5803 11.5274 17.5803H5.56698C5.04133 17.5803 4.61585 17.1545 4.61585 16.6291C4.61589 16.1037 5.04166 15.678 5.56698 15.678Z"
                                  fill="#777777"/>
                        </svg>
                        <span class="text-uppercase fw-bold mx-4">{{__('object.tabs.news')}}</span>
                    </button>
                </li>
            </ul>
            <div class="tab-content mt-4" id="myTabContent">
                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                    @include('components.object-info', ['building' => $building])
                    @include('components.object-character', ['building' => $building])
                    @include('components.object-additional-info', ['building' => $building])

                    @if($building->presentation)
                        @include('components.object-pdf', ['presentation' => $building->presentation])
                    @endif

                    @include('components.object-map', ['building' => $building])
                </div>
                <div class="tab-pane fade" id="plan" role="tabpanel" aria-labelledby="plan-tab">
                    @if($building->plans->isNotEmpty())
                        @include('components.object-plan', ['plans' => $building->plans])
                    @endif
                </div>
                <div class="tab-pane fade pb-3" id="news" role="tabpanel" aria-labelledby="news-tab">
                    @include('components.object-news', ['news' => $building->liveBlogs, 'building' => $building])
                </div>
            </div>
        </div>

    </section>

    @include('components.customer')
@endsection
