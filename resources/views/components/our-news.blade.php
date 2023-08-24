<section class="our-news mb-5">
    <div class="container-lg container-fluid our-news-container px-0">
        <div class="header-banner" style="background-image: url({{ asset('assets/images/img/news.png') }})"></div>
        <div class="row description">
            <div class="col-12 col-md-6 col-lg-10">
                <h2 class="news-title">
                    {{__('home.main.news_title')}}
                </h2>
                <p class="news-subtitle">
                    {{__('home.main.news_subtitle')}}
                </p>
                <form class="row g-3">
                    <div class="col-12 col-lg-6">
                        <label class="label-news">
                            <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.3 0C16.7912 0 18 1.17525 18 2.625V11.375C18 12.8247 16.7912 14 15.3 14H2.7C1.20883 14 0 12.8247 0 11.375V2.625C0 1.17525 1.20883 0 2.7 0H15.3ZM16.2 2.912L9.59265 8.5335C9.28161 8.79811 8.82995 8.82016 8.49547 8.59966L8.40735 8.5335L1.8 2.91287V11.375C1.8 11.8582 2.20294 12.25 2.7 12.25H15.3C15.7971 12.25 16.2 11.8582 16.2 11.375V2.912ZM14.832 1.75H3.1662L9 6.71233L14.832 1.75Z" fill="#DBDBDB"/>
                            </svg>
                        </label>
                        <input type="email" class="form-control news-mail" placeholder="{{__('home.placeholder.mail')}}">
                        <input type="text" value="{!! url()->current() !!}" name="url" hidden>
                        <input type="text" value="новини" name="name_form" hidden>
                    </div>
                    <div class="col-12 col-lg-6">
                        <button type="submit" class="btn btn-outline-primary mb-3 w-100 primary-hover primary-hover-outline position-relative">
                            <span>
                                {{__('home.button.subscribe')}}
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
