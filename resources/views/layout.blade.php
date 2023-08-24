<!doctype html>
<html lang="{{App::getLocale()}}" prefix="og: http://ogp.me/ns#">
<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-86817016-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-86817016-13');
    </script>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ mix('/assets/css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/images/icon/favicon.ico') }}">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
</head>
<body>
@include('sections.header', ['url' => $url ?? null])
@yield('content')
@include('sections.footer')

<!-- Modal -->
<div class="modal fade" id="call-back-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-border"></div>
            <div class="modal-body p-5">
                <button type="button" class="btn-close btn-close-white modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h4 class="modal-title text-center text-uppercase fw-bold" id="exampleModalLabel">{{__('modal.call_back.title')}}</h4>
                <form id="call-back">
                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('modal.call_back.you_name')}}</label>
                        <input required name="name" type="text" class="form-control" id="name" placeholder="{{__('modal.call_back.name')}}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">{{__('modal.call_back.phone')}}</label>
                        <input required name="phone" type="tel" class="form-control" id="phone" placeholder="+38--- -- -- ---">
                    </div>
                    <div class="mb-5">
                        <label for="email" class="form-label">{{__('modal.call_back.email')}}</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Example@gmail.com">
                    </div>
                    <input type="text" hidden name="url" value="{!! url()->current() !!}">
                    <button type="submit" class="btn btn-primary w-100 text-uppercase">
                        {{__('modal.call_back.call')}}
                    </button>
                    <button class="d-none pseudo-btn" data-bs-target="#thank-modal"
                            data-bs-toggle="modal" data-bs-dismiss="modal"></button>
                </form>
            </div>
            <img class="modal-diagonal" src="{{ asset('assets/images/img/diagonal-vertical.png') }}" alt="">
        </div>
    </div>
</div>

<div class="modal fade" id="thank-modal" aria-hidden="true" aria-labelledby="thank-modal-Label" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-border"></div>
            <div class="modal-body p-5">
                <button type="button" class="btn-close btn-close-white modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h4 class="modal-title text-center text-uppercase fw-bold" id="thank-modal-Label">
                    {{__('modal.call_back.thanks')}}
                </h4>
                <div class="text-center my-5">
                    <svg width="67" height="69" viewBox="0 0 67 69" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.4" d="M38.1888 13.2619C36.3799 12.9277 34.7185 14.0822 34.3741 15.8479C34.0297 17.6137 35.1878 19.3377 36.9475 19.6833C42.2457 20.7162 46.3367 24.8174 47.3736 30.1337V30.1375C47.6688 31.6679 49.0161 32.7805 50.5677 32.7805C50.7758 32.7805 50.984 32.7615 51.1959 32.7236C52.9556 32.3704 54.1137 30.6502 53.7693 28.8806C52.2215 20.9402 46.1096 14.8075 38.1888 13.2619Z" fill="#4E5DE3"/>
                        <path opacity="0.4" d="M37.9524 0.0301331C37.1047 -0.0913834 36.2532 0.159244 35.5758 0.698474C34.8795 1.2453 34.4443 2.03516 34.3497 2.91995C34.1491 4.70852 35.4396 6.32621 37.2258 6.52747C49.5441 7.90213 59.1187 17.4981 60.5038 29.8549C60.6893 31.5105 62.0781 32.7599 63.7357 32.7599C63.8606 32.7599 63.9817 32.7523 64.1066 32.7371C64.9732 32.6421 65.7453 32.213 66.2902 31.5295C66.8314 30.846 67.0774 29.9954 66.979 29.1258C65.2533 13.7083 53.321 1.74276 37.9524 0.0301331Z" fill="#4E5DE3"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M27.4756 41.3371C39.6108 53.469 42.3637 39.4337 50.0903 47.1549C57.5393 54.6018 61.8206 56.0938 52.3828 65.529C51.2006 66.479 43.6896 77.909 17.2932 51.5199C-9.10649 25.1276 2.31682 17.6088 3.26713 16.427C12.7278 6.96569 14.1941 11.2719 21.6431 18.7188C29.3696 26.4433 15.3403 29.2052 27.4756 41.3371Z" fill="#2334D0"/>
                    </svg>
                </div>
                <p class="fw-bold text-center">
                    {{__('modal.call_back.thanks_message')}}
                </p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="share" tabindex="-1" aria-labelledby="share" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-border"></div>
            <div class="modal-body p-5">
                <button type="button" class="btn-close btn-close-white modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h4 class="modal-title text-center text-uppercase fw-bold mb-5" id="share">{{__('modal.call_back.share')}}</h4>
                <div class="row mb-5 justify-content-center">
                    {{--<div class="col text-center">
                        <a href="#">
                            <img src="{{ asset('assets/images/img/fb_share.png') }}" alt="facebook">
                            <span>Facebook</span>
                        </a>
                    </div>--}}
                    <div class="col-3 text-center">
                        <a href="https://t.me/share/url?url={!! url()->current() !!}&text={{$textShare ?? ''}}">
                            <img src="{{ asset('assets/images/img/tg_share.png') }}" alt="Telegram">
                            <span>Telegram</span>
                        </a>
                    </div>
                    <div class="col-3 text-center">
                        <a href="viber://forward?text={!! $textShare ?? '' !!} {!! url()->current() !!}">
                            <img src="{{ asset('assets/images/img/vb_share.png') }}" alt="Viber">
                            <span>Viber</span>
                        </a>
                    </div>
                    <div class="col-3 text-center">
                        <a href="https://wa.me/?text={!! $textShare ?? '' !!} {!! url()->current() !!}">
                            <img src="{{ asset('assets/images/img/wa_share.png') }}" alt="Whatsapp">
                            <span>Whatsapp</span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="wrapper-share position-relative">
                        <input class="w-100 copy-link" id="share_link" type="text" value="{!! url()->current() !!}">
                        <label class="position-absolute copy-button" for="share_link">{{__('modal.call_back.copy')}}</label>
                    </div>
                </div>
            </div>
            <img class="modal-diagonal" src="{{ asset('assets/images/img/diagonal-vertical.png') }}" alt="">
        </div>
    </div>
</div>

<div id="cboxOverlay" style="display: none;"></div>
<div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;">
    <div id="cboxWrapper">
        <div>
            <div id="cboxTopLeft" style="float: left;"></div>
            <div id="cboxTopCenter" style="float: left;"></div>
            <div id="cboxTopRight" style="float: left;"></div>
        </div>
        <div style="clear: left;">
            <div id="cboxMiddleLeft" style="float: left;"></div>
            <div id="cboxContent" style="float: left;">
                <div id="cboxTitle" style="float: left;"></div>
                <div id="cboxCurrent" style="float: left;"></div>
                <button id="cboxPrevious"></button>
                <button id="cboxNext"></button>
                <button id="cboxSlideshow"></button>
                <div id="cboxLoadingOverlay" style="float: left;"></div>
                <div id="cboxLoadingGraphic" style="float: left;"></div>
                <button id="cboxClose"></button>
            </div>
            <div id="cboxMiddleRight" style="float: left;"></div>
        </div>
        <div style="clear: left;">
            <div id="cboxBottomLeft" style="float: left;"></div>
            <div id="cboxBottomCenter" style="float: left;"></div>
            <div id="cboxBottomRight" style="float: left;"></div>
        </div>
    </div>
    <div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div>
</div>
<script src="{{ mix('assets/js/main.js') }}"></script>
</body>
</html>
