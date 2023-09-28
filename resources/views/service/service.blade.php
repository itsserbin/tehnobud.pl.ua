@extends('layout')

@section('head')
    @include('schema.breadcrumbs',$breadcrumbs = Breadcrumbs::render('services'))
@endsection

@section('content')
    <section id="services">
        <div class="container-fluid bg-dark black-container"></div>
        <div class="container">
            <div class="s-breadcrumbs">
                {{ Breadcrumbs::render('services') }}
            </div>
        </div>
        <div class="container-fluid">
            <div class="wrapper-contact">
                <div class="row">
                    <div class="col-12 col-xl-7 contact description position-relative">
                        <h2 class="contact-title text-uppercase">
                            {{__('service.title')}}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="wrapper-service mt-5">
                <div class="row">
                    <div class="col-12 card-wrapper">
                        <div class="card-service p-3">
                            <div class="row flex-column-reverse flex-md-row">
                                <div class="col-12 col-md-8 col-xl-9 custom-scroll text-start mt-3 mt-md-0">
                                    <h4 class="fw-bold">
                                        {{__('service.title_card.generic')}}
                                    </h4>
                                    <p>
                                        {!!__('service.generic_text')!!}
                                    </p>
                                </div>
                                <div class="col-12 col-md-4 col-xl-3">
                                    <div class="card-service-img"
                                         style="background-image: url({{ asset('assets/images/img/services/service1.png') }})"></div>
                                    <a href="#"
                                       class="btn btn-primary px-4 w-100 text-center d-none d-md-block d-xl-none"
                                       data-bs-toggle="modal"
                                       data-name-form="{{__('service.title_card.generic')}}"
                                       data-bs-target="#call-back-modal">
                                        {{__('home.button.consultation1')}}
                                    </a>
                                </div>
                            </div>
                            <div class="row d-md-none d-xl-block mt-3">
                                <div class="offset-0 offset-md-9 col-xl-3 align-self-center">
                                    <a href="#"
                                       class="btn btn-primary px-4 w-100 text-center btn-consultation primary-hover"
                                       data-bs-toggle="modal"
                                       data-name-form="{{__('service.title_card.generic')}}"
                                       data-bs-target="#call-back-modal">
                                        <span>
                                            {{__('home.button.consultation1')}}
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 card-wrapper">
                        <div class="card-service p-3">
                            <div class="row flex-column-reverse flex-md-row">
                                <div class="col-12 col-md-4 col-xl-3">
                                    <div class="card-service-img"
                                         style="background-image: url({{ asset('assets/images/img/services/service2.png') }})"></div>
                                    <a href="#"
                                       class="btn btn-primary px-4 w-100 text-center d-none d-md-block d-xl-none"
                                       data-bs-toggle="modal"
                                       data-bs-target="#call-back-modal">
                                        {{__('home.button.consultation2')}}
                                    </a>
                                </div>
                                <div class="col-12 col-md-8 col-xl-9 custom-scroll text-start mt-3 mt-md-0">
                                    <h4 class="fw-bold">
                                        {{__('service.title_card.project')}}
                                    </h4>
                                    <p>
                                        {!!__('service.project_text')!!}
                                    </p>
                                </div>
                            </div>
                            <div class="row d-md-none d-xl-block mt-3">
                                <div class="col-xl-3 align-self-center">
                                    <a href="#"
                                       class="btn btn-primary px-4 w-100 text-center btn-consultation primary-hover"
                                       data-bs-toggle="modal"
                                       data-name-form="{{__('service.title_card.project')}}"
                                       data-bs-target="#call-back-modal">
                                        <span>
                                            {{__('home.button.consultation2')}}
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 card-wrapper">
                        <div class="card-service p-3">
                            <div class="row flex-column-reverse flex-md-row">
                                <div class="col-12 col-md-8 col-xl-9 custom-scroll text-start mt-3 mt-md-0">
                                    <h4 class="fw-bold">
                                        {{__('service.title_card.ingeneric')}}
                                    </h4>
                                    <p>
                                        {!!__('service.ingeneric_text')!!}
                                    </p>
                                </div>
                                <div class="col-12 col-md-4 col-xl-3">
                                    <div class="card-service-img"
                                         style="background-image: url({{ asset('assets/images/img/services/service3.png') }})"></div>
                                    <a href="#"
                                       class="btn btn-primary px-4 w-100 text-center d-none d-md-block d-xl-none"
                                       data-bs-toggle="modal"
                                       data-name-form="{{__('service.title_card.ingeneric')}}"
                                       data-bs-target="#call-back-modal">
                                        {{__('home.button.consultation3')}}
                                    </a>
                                </div>
                            </div>
                            <div class="row d-md-none d-xl-block mt-3">
                                <div class="offset-0 offset-md-9 col-xl-3 align-self-center">
                                    <a href="#"
                                       class="btn btn-primary px-4 w-100 text-center btn-consultation primary-hover"
                                       data-bs-toggle="modal"
                                       data-name-form="{{__('service.title_card.ingeneric')}}"
                                       data-bs-target="#call-back-modal">
                                        <span>
                                            {{__('home.button.consultation3')}}
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 card-wrapper">
                        <div class="card-service p-3">
                            <div class="row flex-column-reverse flex-md-row">
                                <div class="col-12 col-md-4 col-xl-3">
                                    <div class="card-service-img"
                                         style="background-image: url({{ asset('assets/images/img/services/service4.png') }})"></div>
                                    <a href="#"
                                       class="btn btn-primary px-4 w-100 text-center d-none d-md-block d-xl-none"
                                       data-bs-toggle="modal"
                                       data-name-form="{{__('service.title_card.montag')}}"
                                       data-bs-target="#call-back-modal">
                                        {{__('home.button.consultation4')}}
                                    </a>
                                </div>
                                <div class="col-12 col-md-8 col-xl-9 custom-scroll text-start mt-3 mt-md-0">
                                    <h4 class="fw-bold">
                                        {{__('service.title_card.montag')}}
                                    </h4>
                                    <p>
                                        {!!__('service.montag_text')!!}
                                    </p>
                                </div>
                            </div>
                            <div class="row d-md-none d-xl-block mt-3">
                                <div class="col-xl-3 align-self-center">
                                    <a href="#"
                                       class="btn btn-primary px-4 w-100 text-center btn-consultation primary-hover"
                                       data-bs-toggle="modal"
                                       data-name-form="{{__('service.title_card.ingeneric')}}"
                                       data-bs-target="#call-back-modal">
                                        <span>
                                            {{__('home.button.consultation4')}}
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 card-wrapper">
                        <div class="card-service p-3">
                            <div class="row flex-column-reverse flex-md-row">
                                <div class="col-12 col-md-8 col-xl-9 custom-scroll text-start mt-3 mt-md-0">
                                    <h4 class="fw-bold">
                                        {{__('service.title_card.clear')}}
                                    </h4>
                                    <p>
                                        {!! __('service.clear') !!}
                                    </p>
                                </div>
                                <div class="col-12 col-md-4 col-xl-3">
                                    <div class="card-service-img"
                                         style="background-image: url({{ asset('assets/images/img/services/service6.png') }})"></div>
                                    <a href="#"
                                       class="btn btn-primary px-4 w-100 text-center d-none d-md-block d-xl-none"
                                       data-bs-toggle="modal"
                                       data-name-form="{{__('service.title_card.clear')}}"
                                       data-bs-target="#call-back-modal">
                                        {{__('home.button.consultation5')}}
                                    </a>
                                </div>
                            </div>
                            <div class="row d-md-none d-xl-block mt-3">
                                <div class="offset-0 offset-md-9 col-xl-3 align-self-center">
                                    <a href="#"
                                       class="btn btn-primary px-4 w-100 text-center btn-consultation primary-hover"
                                       data-bs-toggle="modal"
                                       data-name-form="{{__('service.title_card.clear')}}"
                                       data-bs-target="#call-back-modal">
                                        <span>
                                            {{__('home.button.consultation5')}}
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('components.our-news')
    @include('components.customer')
@endsection
