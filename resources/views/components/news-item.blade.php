@php
    /* @var \App\ReadModels\LiveBlog $new */
    /* @var \App\ReadModels\Building $building */
@endphp
<div class="news position-relative p-3 mb-5">
    <h4 class="news-title text-uppercase fw-bold position-absolute">
        {{$new->name}}
    </h4>
    <div class="row flex-column flex-md-row">
        <div class="col-12 col-md-3">
            <img loading="lazy" class="news-img w-100" src="{{ $new->images[0]->media ?? asset('assets/images/img/news-img.png') }}" alt="">
        </div>
        <div class="col-12 col-md-7 mt-3 mt-md-0">
            <p class="news-date fw-bold">
                {{$new->published_at->format('d-m-Y')}}
            </p>
            <p class="news-text">
                {{Illuminate\Support\Str::limit($new->description)}}
            </p>
        </div>
        <div class="col-9 col-md-2 mt-3 mt-md-0 align-self-end">
            <a href="{{localUrl("/$building->slug/news/$new->slug")}}"
               class="btn btn-outline-secondary w-100 news-button">
                {{__('news.more')}}
                <svg width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M0.70014 13C0.879332 13 1.05852 12.9292 1.19502 12.7884L6.79474 7.01069C7.06842 6.72831 7.06842 6.27187 6.79474 5.98949L1.19502 0.211789C0.921329 -0.0705962 0.478951 -0.0705962 0.205265 0.211789C-0.0684214 0.494174 -0.0684214 0.950612 0.205265 1.233L5.31011 6.50009L0.205265 11.7672C-0.0684214 12.0496 -0.0684214 12.506 0.205265 12.7884C0.341758 12.9292 0.52095 13 0.70014 13Z"
                          fill="#4E5DE3"/>
                </svg>
            </a>
        </div>
    </div>
</div>
