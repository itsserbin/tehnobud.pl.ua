@php
    /* @var \App\ReadModels\Building[]|\Illuminate\Support\Collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator $buildings */
    /* @var \Illuminate\Support\Collection|array<array-key, string> $citiesSelect */
@endphp
<section id="home-slider">
    <div class="container-fluid home-bg">
        <div class="row home-block position-absolute w-100">
            <div class="col-12 col-xl-7 home-block__dark"></div>
            <div class="col-5 bg-light d-none d-xl-block"></div>
        </div>
        <div class="container">
            <div class="row pt-2">
                <div class="col-3">
                    <div class="home-block__title position-absolute col-12 col-md-3">
                        <h1 class="home-title">{{__('home.main.title')}}</h1>
                        <a href="{{localUrl("/about-us")}}" class="nav-link link-our-service">
                            <span>{{__('home.button.about')}}</span>
                            <svg width="39" height="14" viewBox="0 0 39 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M31.4953 0.575659L31.6176 0.435563C32.1477 -0.100515 32.9819 -0.14175 33.5588 0.311855L33.6973 0.435563L38.5398 5.94844L38.6007 6.01381L38.6818 6.1147L38.7872 6.28013L38.8658 6.44777L38.9179 6.60442L38.9604 6.82436L38.9706 6.99998L38.9665 7.11187L38.9408 7.29848L38.8974 7.46417L38.8328 7.62936L38.7559 7.77433L38.6475 7.93009L38.5398 8.05153L33.6973 13.5644C33.1231 14.1452 32.1919 14.1452 31.6176 13.5644C31.0875 13.0284 31.0467 12.1848 31.4953 11.6014L31.6176 11.4614L33.947 8.48709L1.47059 8.48709C0.658405 8.48709 7.36804e-08 7.82129 8.34744e-08 6.99998C9.32683e-08 6.17868 0.658405 5.51288 1.47059 5.51288L33.95 5.51288L31.6176 2.53865C31.0875 2.00257 31.0467 1.15904 31.4953 0.575659Z"
                                      fill="#fff"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-xl-9 p-0">
                    <div class="home-slider">
                        <div class="slider-item" style="background-image: url('/assets/images/img/home-slider/home-slider_1.png')"></div>
                        <div class="slider-item" style="background-image: url('/assets/images/img/home-slider/home-slider_2.jpg')"></div>
                        <div class="slider-item" style="background-image: url('/assets/images/img/home-slider/home-slider_3.jpg')"></div>
                        <div class="slider-item" style="background-image: url('/assets/images/img/home-slider/home-slider_4.jpg')"></div>
                        <div class="slider-item" style="background-image: url('/assets/images/img/home-slider/home-slider_5.jpg')"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('components.customer-home')
<section class="catalog my-5" id="catalog">
    <div class="container">
        <div class="header-filter-wrapper mb-5">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <h2 class="header-filter__title">{{__('home.main.catalog_object')}}</h2>
                </div>
                <div class="col-lg-8 col-12">
                    <form action="api/buildings" id="home-filter" method="GET" autocomplete="off">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="input-group mb-3">
                                    <select id="city_id" name="city_id" class="form-select">
                                        <option value="" selected>{{__('home.placeholder.city')}}</option>
                                        @foreach($citiesSelect as $id => $city)
                                            <option id="{{$id}}" value="{{$id}}">{{$city}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="input-group mb-3">
                                    <select id="district_id" name="district_id" class="form-select">
                                        <option value="" disabled selected hidden>{{__('home.placeholder.kvartal')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="search_form input-group">
                                    <input name="name" type="text" class="form-control" placeholder="{{__('home.placeholder.search')}}"
                                           aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-light" type="submit" id="search">
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.65 0C11.875 0 15.3 3.42502 15.3 7.65C15.3 9.45606 14.6741 11.1159 13.6275 12.4246L16.751 15.549C17.083 15.8809 17.083 16.4191 16.751 16.751C16.4446 17.0575 15.9625 17.081 15.629 16.8218L15.549 16.751L12.4246 13.6275C11.1159 14.6741 9.45606 15.3 7.65 15.3C3.42502 15.3 0 11.875 0 7.65C0 3.42502 3.42502 0 7.65 0ZM7.65 1.7C4.36391 1.7 1.7 4.36391 1.7 7.65C1.7 10.9361 4.36391 13.6 7.65 13.6C10.9361 13.6 13.6 10.9361 13.6 7.65C13.6 4.36391 10.9361 1.7 7.65 1.7Z"
                                                  fill="#4267B2"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="items">
            <div class="row row-cols-1 row-cols-md-3 g-5" id="buildings">
                @foreach($buildings as $building)
                    @php
                        /* @var \App\ReadModels\Building $building */
                    @endphp
                    @include('components.item', ['building' => $building])
                @endforeach
            </div>
            <form action="api/buildings" method="get" autocomplete="off" id="more_page">
                <div class="row justify-content-center justify-content-lg-start">
                    <input type="hidden" name="city_id" id="more_city">
                    <input type="hidden" name="district_id" id="more_district">
                    <input type="hidden" name="page" value="2" id="input_page">
                    @if($buildings->count() === 6)
                    <button type="submit" class="btn btn-outline-primary col-10 col-sm-6 col-lg-3 mt-5 py-3
                        primary-hover primary-hover-outline position-relative">
                    <span>
                        {{__('home.button.more_object')}}
                    <svg width="20" height="23" viewBox="0 0 20 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M1.22892 9.68438C1.86988 9.67391 2.40628 10.1325 2.48896 10.7333L2.49983 10.8743L2.50436 11.1452C2.64057 15.0495 5.95405 18.1579 10 18.1579C10.2337 18.1579 10.4658 18.1476 10.6959 18.1271L10.3661 17.8033C9.87796 17.3306 9.87796 16.5641 10.3661 16.0914C10.8543 15.6187 11.6457 15.6187 12.1339 16.0914L14.6339 18.5124C15.122 18.9852 15.122 19.7517 14.6339 20.2244L12.1339 22.6454C11.6457 23.1182 10.8543 23.1182 10.3661 22.6454C9.87796 22.1727 9.87796 21.4062 10.3661 20.9335L10.7639 20.5511C10.5108 20.5696 10.256 20.5789 10 20.5789C4.71088 20.5789 0.36108 16.5956 0.0208338 11.5127L0.00525558 11.2065L0.000181438 10.9152C-0.0114611 10.2467 0.538666 9.69566 1.22892 9.68438ZM9.63389 0.354555C10.0845 0.79093 10.1192 1.47758 9.73787 1.95246L9.63389 2.0665L9.23646 2.44892C9.48951 2.43038 9.74416 2.42105 10 2.42105C15.5228 2.42105 20 6.75682 20 12.1053C20 12.7738 19.4404 13.3158 18.75 13.3158C18.0596 13.3158 17.5 12.7738 17.5 12.1053C17.5 8.09393 14.1421 4.84211 10 4.84211C9.76617 4.84211 9.5339 4.85243 9.30369 4.87291L9.63389 5.19666C10.122 5.6694 10.122 6.43586 9.63389 6.9086C9.18328 7.34498 8.47424 7.37855 7.98388 7.00931L7.86612 6.9086L5.36612 4.48755C4.91551 4.05117 4.88085 3.36453 5.26213 2.88965L5.36612 2.77561L7.86612 0.354555C8.35427 -0.118185 9.14573 -0.118185 9.63389 0.354555Z"
                              fill="#4E5DE3"/>
                    </svg>
                    </span>
                    </button>
                    @endif
                </div>
            </form>

        </div>
    </div>
</section>
@include('components.our-news')
