@php
    /* @var \App\ReadModels\Building $building */
@endphp
<div class="col-12 col-md-6 col-lg-4 align-content-center building-card">
    <div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
        <div class="card">
            <a itemprop="url" href="{{localUrl("/$building->slug")}}" class="position-relative">
                <span class="card-hover"></span>
                <img loading="lazy" itemprop="image" src="{{ $building->mainPhoto?->url ?? asset('assets/images/img/item.png') }}"
                     class="card-img-top" alt="item">
                <span class="row position-absolute hover-link text-center">
                    <span class="col-12">
                        {{__('object.details')}}
                    </span>
                    <svg class="col-12" width="52" height="14" viewBox="0 0 52 14" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M44.0188 0.575659L44.1412 0.435563C44.6713 -0.100515 45.5055 -0.14175 46.0824 0.311855L46.2209 0.435563L51.0634 5.94844L51.1243 6.01381L51.2054 6.1147L51.3108 6.28013L51.3894 6.44777L51.4414 6.60443L51.484 6.82436L51.4941 6.99998L51.49 7.11187L51.4643 7.29848L51.421 7.46417L51.3564 7.62936L51.2794 7.77433L51.171 7.93009L51.0634 8.05153L46.2209 13.5644C45.6466 14.1452 44.7155 14.1452 44.1412 13.5644C43.611 13.0284 43.5703 12.1848 44.0188 11.6014L44.1412 11.4614L46.4706 8.48709L1.47059 8.48707C0.658405 8.48707 7.36806e-08 7.82127 8.34745e-08 6.99997C9.32685e-08 6.17866 0.658405 5.51286 1.47059 5.51286L46.4735 5.51288L44.1412 2.53865C43.611 2.00257 43.5703 1.15904 44.0188 0.575659Z"
                              fill="white"/>
                    </svg>
                </span>
            </a>
            <div class="card-body">
                <div class="row">
                    <div class="col-10">
                        <h5 itemprop="name" class="card-title">{{$building->name}}</h5>
                        @if($building->price)
                            <p class="card-text">{{__('object.price')}}

                                - <span itemprop="price">{{$building->price_format}}</span>
                                <meta itemprop="priceCurrency" content="USD">
                                {{__('object.currency')}}
                            </p>
                        @endif
                    </div>
                    <div class="col-2 align-self-center">
                        <a itemprop="url" class="nav justify-content-end" href="{{localUrl("/$building->slug")}}">
                            <svg width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M0.70014 13C0.879332 13 1.05852 12.9292 1.19502 12.7884L6.79474 7.01069C7.06842 6.72831 7.06842 6.27187 6.79474 5.98949L1.19502 0.211789C0.921329 -0.0705962 0.478951 -0.0705962 0.205265 0.211789C-0.0684214 0.494174 -0.0684214 0.950612 0.205265 1.233L5.31011 6.50009L0.205265 11.7672C-0.0684214 12.0496 -0.0684214 12.506 0.205265 12.7884C0.341758 12.9292 0.52095 13 0.70014 13Z"
                                      fill="#4E5DE3"/>
                            </svg>
                        </a>
                    </div>
                    @if($building->presentation)
                        <div class="row mt-2">
                            <div class="btn-group me-2" role="group" aria-label="First group">
                                <a href="{{$building->presentation->pdf}}" class="btn btn-primary px-4 primary-hover"
                                   rel="nofollow" target="_blank">
                                <span>
                                    {{__('home.button.download_pdf')}}
                                </span>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
