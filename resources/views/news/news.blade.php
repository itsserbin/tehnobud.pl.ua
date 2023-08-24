@php
    /* @var \App\ReadModels\LiveBlog $blogs */
@endphp

@extends('layout', ['url' => $url, 'textShare' => rawurlencode(strip_tags($blogs->description))])

@section('content')
    <section id="news">
        <div class="container-fluid bg-dark black-container"></div>
        <div class="container-fluid bg-white white-container mt-3">
            <div class="container">
                <div class="wrapper-contact">
                    <div class="row justify-content-between">
                        <div class="col contact description position-relative mt-3 mt-md-0">
                            <a href="{{localUrl($blogs->building->slug)}}"
                               class="contact-title text-uppercase nav-link">
                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M8.7903 0.387101L8.70711 0.292893C8.34662 -0.0675905 7.77939 -0.0953204 7.3871 0.209704L7.29289 0.292893L0.292893 7.29289L0.251496 7.33685L0.196335 7.40469L0.124671 7.51594L0.0712254 7.62866L0.035845 7.73401L0.00690722 7.8819L0 8L0.00278783 8.07524L0.0202401 8.20073L0.0497382 8.31214L0.0936735 8.42322L0.145995 8.52071L0.219689 8.62545L0.292893 8.70711L7.29289 15.7071C7.68342 16.0976 8.31658 16.0976 8.70711 15.7071C9.06759 15.3466 9.09532 14.7794 8.7903 14.3871L8.70711 14.2929L3.416 9H19C19.5523 9 20 8.55228 20 8C20 7.44772 19.5523 7 19 7H3.414L8.70711 1.70711C9.06759 1.34662 9.09532 0.779392 8.7903 0.387101L8.70711 0.292893L8.7903 0.387101Z"
                                          fill="#757575"/>
                                </svg>
                                {{__('news.back')}}
                            </a>
                        </div>

                        <div class="col d-none d-md-block">
                            <div class="row justify-content-end">
                                <a href="#" class="text-uppercase nav-link share-link" data-bs-toggle="modal"
                                   data-bs-target="#share">
                                    <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.2 13.1235C7.2 13.9018 6.24527 14.2775 5.68711 13.7647L5.61667 13.6928L0.216669 7.5693C-0.0481487 7.269 -0.0702168 6.83778 0.150465 6.51566L0.216669 6.4307L5.61667 0.307233C6.13779 -0.283706 7.11423 0.0349513 7.1947 0.777336L7.2 0.876532V3.50088L8.1342 3.57654C13.6207 4.02094 17.8613 8.41415 17.9967 13.7358L18 13.9982L15.6071 12.6692C13.1748 11.3182 10.4378 10.5756 7.64192 10.5047L7.2 10.4991V13.1235Z"
                                            fill="#757575"/>
                                    </svg>
                                    {{__('news.share')}}
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-light">
            <div class="container bg-white wrapper-news">
                <div class="p-0 p-md-4">
                    <div class="wrapper-text">
                        <p class="date">{{$blogs->published_at->format('d-m-Y')}}</p>
                        <h4 class="title-news text-uppercase fw-bold">
                            {{$blogs->name}}
                        </h4>
                        <p class="text-news mt-4">
                            {!! $blogs->description !!}
                        </p>
                    </div>
                    <div class="wrapper-img mt-4">
                        <div class="row">
                            @foreach($blogs->images as $image)
                                <div class="col-12 col-md-4 mb-3">
                                    <img src="{{ $image->media }}" alt=""
                                         class="img-news w-100">
                                </div>
                            @endforeach

                            @foreach($blogs->videos as $video)
                                <div class="col-12 col-md-4 mb-3">
                                    <iframe width="560" height="315" src="{{$video}}"
                                            title="YouTube video player"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container d-md-none">
            <div class="wrapper-contact">
                <div class="row justify-content-between">
                    <div class="col mt-3 mt-md-0">
                        <div class="row">
                            <a href="#" class="text-uppercase nav-link share-link" data-bs-toggle="modal"
                               data-bs-target="#share">
                                <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.2 13.1235C7.2 13.9018 6.24527 14.2775 5.68711 13.7647L5.61667 13.6928L0.216669 7.5693C-0.0481487 7.269 -0.0702168 6.83778 0.150465 6.51566L0.216669 6.4307L5.61667 0.307233C6.13779 -0.283706 7.11423 0.0349513 7.1947 0.777336L7.2 0.876532V3.50088L8.1342 3.57654C13.6207 4.02094 17.8613 8.41415 17.9967 13.7358L18 13.9982L15.6071 12.6692C13.1748 11.3182 10.4378 10.5756 7.64192 10.5047L7.2 10.4991V13.1235Z"
                                        fill="#757575"/>
                                </svg>
                                {{__('news.share')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    @include('components.customer')
@endsection
