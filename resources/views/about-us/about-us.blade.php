@extends('layout')

@section('head')
    @include('schema.breadcrumbs',$breadcrumbs = Breadcrumbs::generate('about-us'))
@endsection

@section('content')
    <section id="about-us">
        <div class="container-fluid bg-dark">
            <div class="wrapper-contact">
                <div class="row flex-column-reverse flex-md-row">
                    <div class="col-12 col-md-7 bg-light contact description position-relative">
                        <div class="s-breadcrumbs mb-5">
                            {{ Breadcrumbs::render('about-us') }}
                        </div>
                        <h2 class="contact-title text-uppercase">
                            {{__('about-us.title')}}
                        </h2>
                        <div class="row">
                            <div class="col-12 col-md-9">
                                <div class="contact-items mt-4">
                                    <h3 class="about-subtitle mb-4">
                                        {{__('about-us.subtitle')}}
                                    </h3>
                                    <p class="mb-4">{!! __('about-us.text1') !!}</p>
                                    <p class="mb-4">{!! __('about-us.text2') !!}</p>
                                    <p>{!! __('about-us.text3') !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 contact position-relative">
                        <div class="wrapper-map position-md-absolute">
                            <div class="img-about position-md-absolute"
                                 style="background-image: url({{ asset('assets/images/img/about.png') }})"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="service">
        <div class="container">
            <div class="row mt-5 pt-5">
                <div class="col-12 col-md-9">
                    <h3>{{__('about-us.services.title')}}</h3>
                </div>
                <div class="col-12 col-md-3">
                    <a href="{{localUrl("/service")}}" class="nav-link our-service">
                        <span>{{__('home.menu.service')}}</span>
                        <svg width="39" height="14" viewBox="0 0 39 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M31.4953 0.575659L31.6176 0.435563C32.1477 -0.100515 32.9819 -0.14175 33.5588 0.311855L33.6973 0.435563L38.5398 5.94844L38.6007 6.01381L38.6818 6.1147L38.7872 6.28013L38.8658 6.44777L38.9179 6.60442L38.9604 6.82436L38.9706 6.99998L38.9665 7.11187L38.9408 7.29848L38.8974 7.46417L38.8328 7.62936L38.7559 7.77433L38.6475 7.93009L38.5398 8.05153L33.6973 13.5644C33.1231 14.1452 32.1919 14.1452 31.6176 13.5644C31.0875 13.0284 31.0467 12.1848 31.4953 11.6014L31.6176 11.4614L33.947 8.48709L1.47059 8.48709C0.658405 8.48709 7.36804e-08 7.82129 8.34744e-08 6.99998C9.32683e-08 6.17868 0.658405 5.51288 1.47059 5.51288L33.95 5.51288L31.6176 2.53865C31.0875 2.00257 31.0467 1.15904 31.4953 0.575659Z"
                                  fill="#4E5DE3"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="service-items mt-5">
                <div class="row justify-content-center">
                    <div class="col-6 col-sm-4 col-lg-3 col-xl-2 mx-0 mx-xl-2 mb-3">
                        <a class="nav-link">
                            <div class="card">
                                <img loading="lazy" src="{{ asset('assets/images/img/service/v1.png') }}"
                                     class="card-img-top position-absolute" alt="item">
                                <div class="card-body">
                                    <div class="row">
                                        <p class="mb-0">01.</p>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 fw-bold text-dark text-center nav-link-text">{{__('about-us.services.01')}}</p>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-3 col-xl-2 mx-0 mx-xl-2 mb-3">
                        <a class="nav-link">
                            <div class="card">
                                <img loading="lazy" src="{{ asset('assets/images/img/service/v2.png') }}"
                                     class="card-img-top position-absolute" alt="item">
                                <div class="card-body">
                                    <div class="row">
                                        <p class="mb-0">02.</p>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 fw-bold text-dark text-center nav-link-text">{{__('about-us.services.02')}}</p>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-3 col-xl-2 mx-0 mx-xl-2 mb-3">
                        <a class="nav-link">
                            <div class="card">
                                <img loading="lazy" src="{{ asset('assets/images/img/service/v3.png') }}"
                                     class="card-img-top position-absolute" alt="item">
                                <div class="card-body">
                                    <div class="row">
                                        <p class="mb-0">03.</p>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 fw-bold text-dark text-center nav-link-text">{{__('about-us.services.03')}}</p>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-3 col-xl-2 mx-0 mx-xl-2 mb-3">
                        <a class="nav-link">
                            <div class="card">
                                <img loading="lazy" src="{{ asset('assets/images/img/service/v4.png') }}"
                                     class="card-img-top position-absolute" alt="item">
                                <div class="card-body">
                                    <div class="row">
                                        <p class="mb-0">04.</p>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 fw-bold text-dark text-center nav-link-text">{{__('about-us.services.04')}}</p>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-3 col-xl-2 mx-0 mx-xl-2 mb-3">
                        <a class="nav-link">
                            <div class="card">
                                <img loading="lazy" src="{{ asset('assets/images/img/service/v5.png') }}"
                                     class="card-img-top position-absolute" alt="item">
                                <div class="card-body">
                                    <div class="row">
                                        <p class="mb-0">05.</p>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 fw-bold text-dark text-center nav-link-text">{{__('about-us.services.05')}}</p>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-3 col-xl-2 mx-0 mx-xl-2 mb-3">
                        <a class="nav-link">
                            <div class="card">
                                <img loading="lazy" src="{{ asset('assets/images/img/service/v6.png') }}"
                                     class="card-img-top position-absolute" alt="item">
                                <div class="card-body">
                                    <div class="row">
                                        <p class="mb-0">06.</p>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 fw-bold text-dark text-center nav-link-text">{{__('about-us.services.06')}}</p>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-3 col-xl-2 mx-0 mx-xl-2 mb-3">
                        <a class="nav-link">
                            <div class="card">
                                <img loading="lazy" src="{{ asset('assets/images/img/service/v7.png') }}"
                                     class="card-img-top position-absolute" alt="item">
                                <div class="card-body">
                                    <div class="row">
                                        <p class="mb-0">07.</p>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 fw-bold text-dark text-center nav-link-text">{{__('about-us.services.07')}}</p>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-3 col-xl-2 mx-0 mx-xl-2 mb-3">
                        <a class="nav-link">
                            <div class="card">
                                <img loading="lazy" src="{{ asset('assets/images/img/service/v8.png') }}"
                                     class="card-img-top position-absolute" alt="item">
                                <div class="card-body">
                                    <div class="row">
                                        <p class="mb-0">08.</p>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 fw-bold text-dark text-center nav-link-text">{{__('about-us.services.08')}}</p>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-3 col-xl-2 mx-0 mx-xl-2 mb-3">
                        <a class="nav-link">
                            <div class="card">
                                <img loading="lazy" src="{{ asset('assets/images/img/service/v9.png') }}"
                                     class="card-img-top position-absolute" alt="item">
                                <div class="card-body">
                                    <div class="row">
                                        <p class="mb-0">09.</p>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 fw-bold text-dark text-center nav-link-text">{{__('about-us.services.09')}}</p>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-3 col-xl-2 mx-0 mx-xl-2 mb-3">
                        <a class="nav-link">
                            <div class="card">
                                <img loading="lazy" src="{{ asset('assets/images/img/service/v10.png') }}"
                                     class="card-img-top position-absolute" alt="item">
                                <div class="card-body">
                                    <div class="row">
                                        <p class="mb-0">10.</p>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 fw-bold text-dark text-center nav-link-text">{{__('about-us.services.10')}}</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="documentation" class="bg-light pt-4 mt-5">
        <div class="container">
            <h3>{{__('about-us.documentation.title')}}</h3>
            <div class="wrapper-license mt-5">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <a class="nav-link text-center">
                            <div class="card mx-auto">
                                <img loading="lazy" src="{{ asset('assets/images/img/license1.jpeg') }}"
                                     class="card-img-top"
                                     alt="item">
                            </div>
                            <p class="mt-3 fw-bold text-dark">{{__('about-us.documentation.license')}}</p>
                            <p class="mt-3 text-dark">{{__('about-us.documentation.license-subtitle')}}</p>
                        </a>
                    </div>
                    <div class="col-12 col-md-6">
                        <a class="nav-link text-center">
                            <div class="card mx-auto">
                                <img loading="lazy" src="{{ asset('assets/images/img/license2.jpeg') }}"
                                     class="card-img-top"
                                     alt="item">
                            </div>
                            <p class="mt-3 fw-bold text-dark">{{__('about-us.documentation.sertificate')}}</p>
                            <p class="mt-3 text-dark">{{__('about-us.documentation.sertificate-title1')}}</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="partner" class="pt-4 mt-5">
        <div class="container">
            <h3>{{__('about-us.documentation.partner')}}</h3>
            <div class="row mt-5 justify-content-center wrapper-partner">
                <div class="col-4 col-lg-3 col-xl-2 mx-3 mx-md-0 mx-xl-2 mb-5 text-center d-flex flex-column justify-content-center d-flex flex-column justify-content-center">
                    <div class="row partner-img">
                        <img loading="lazy" src="{{ asset('assets/images/img/service/partner_1.png') }}" alt="item">
                    </div>
                    <div class="row">
                        <span>Крайт</span>
                    </div>
                </div>
                <div class="col-4 col-lg-3 col-xl-2 mx-3 mx-md-0 mx-xl-2 mb-5 text-center d-flex flex-column justify-content-center">
                    <div class="row partner-img">
                        <img loading="lazy" src="{{ asset('assets/images/img/service/partner_2.png') }}" alt="item">
                    </div>
                    <div class="row">
                        <span>
                            Міні Максі
                        </span>
                    </div>
                </div>
                <div class="col-4 col-lg-3 col-xl-2 mx-3 mx-md-0 mx-xl-2 mb-5 text-center d-flex flex-column justify-content-center">
                    <div class="row partner-img">
                        <img loading="lazy" src="{{ asset('assets/images/img/service/partner_3.png') }}" alt="item">
                    </div>
                    <div class="row">
                        <span>
                            Міні Максі
                        </span>
                    </div>
                </div>
                <div class="col-4 col-lg-3 col-xl-2 mx-3 mx-md-0 mx-xl-2 mb-5 text-center d-flex flex-column justify-content-center">
                    <div class="row partner-img">
                        <img loading="lazy" src="{{ asset('assets/images/img/service/partner_4.png') }}" alt="item">
                    </div>
                    <div class="row">
                        <span>
                            КПП Терешки
                        </span>
                    </div>
                </div>
                <div class="col-4 col-lg-3 col-xl-2 mx-3 mx-md-0 mx-xl-2 mb-5 text-center d-flex flex-column justify-content-center">
                    <div class="row partner-img">
                        <img loading="lazy" src="{{ asset('assets/images/img/service/partner_5.png') }}" alt="item">
                    </div>
                    <div class="row">
                        <span>
                            КонвентСервис
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('components.our-news')
    @include('components.customer')
@endsection
