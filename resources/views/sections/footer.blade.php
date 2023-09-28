<footer id="footer" class="py-5">
    <div class="container">
        <div class="row flex-column flex-md-row">
            <div class="col-12 col-md-6">
                @if(checkCurrentUrl('/') !== 'active')
                    <a class="navbar-brand" href="{{localUrl("/")}}">
                        <img loading="lazy" src="{{ asset('assets/images/icon/logo-footer.png') }}" alt="Logo">
                        <span class="logo-text text-uppercase fw-bold">{{__('home.main.logo')}}</span>
                    </a>
                @else
                    <span class="navbar-brand">
                        <img loading="lazy" src="{{ asset('assets/images/icon/logo-footer.png') }}" alt="Logo">
                        <span class="logo-text text-uppercase fw-bold">{{__('home.main.logo')}}</span>
                    </span>
                @endif

                <p class="text-muted mt-5 d-none d-xl-block">Copyright ©2023</p>
                <form action="#" class="d-none d-md-block d-xl-none mt-5">
                    <button type="button" class="btn btn-outline-primary w-100 primary-hover
                             primary-hover-outline position-relative" data-bs-toggle="modal"
                            data-bs-target="#call-back-modal">
                                <span>
                                    {{__('home.button.leave_request')}}
                                </span>
                    </button>
                </form>
            </div>
            <div class="col-12 col-md-6">
                <div class="row mt-4 flex-column flex-md-row">
                    <div class="nav-item col-12 col-md-3 align-items-center">
                        @if(checkCurrentUrl('/') !== 'active')
                            <a class="nav-link link-light px-0 text-center" aria-current="page"
                               href="{{localUrl("/")}}">
                                {{__('home.menu.catalog')}}
                            </a>
                        @else
                            <span class="nav-link link-light px-0 text-center" aria-current="page">
                                {{__('home.menu.catalog')}}
                            </span>
                        @endif
                    </div>
                    <div class="nav-item col-12 col-md-3 align-items-center">
                        @if(checkCurrentUrl('/service') !== 'active')
                            <a class="nav-link link-light px-0 text-center"
                               href="{{localUrl("service")}}">{{__('home.menu.service')}}</a>
                        @else
                            <span class="nav-link link-light px-0 text-center">{{__('home.menu.service')}}</span>
                        @endif
                    </div>
                    <div class="nav-item col-12 col-md-3 align-items-center">
                        @if(checkCurrentUrl('/about-us') !== 'active')
                            <a class="nav-link link-light px-0 text-center"
                               href="{{localUrl("about-us")}}">{{__('home.menu.about')}}</a>
                        @else
                            <span class="nav-link link-light px-0 text-center">{{__('home.menu.about')}}</span>
                        @endif
                    </div>
                    <div class="nav-item col-12 col-md-3 align-items-center">
                        @if(checkCurrentUrl('/contact') !== 'active')
                            <a class="nav-link link-light px-0 text-center"
                               href="{{localUrl("contact")}}">
                                {{__('home.menu.contact')}}
                            </a>
                        @else
                            <span class="nav-link link-light px-0 text-center">{{__('home.menu.contact')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row mt-5 flex-column-reverse flex-md-row">
                    <div class="col-12 col-md-4 d-block d-md-none d-xl-block mt-4 mt-md-0">
                        <form action="#" class="h-100">
                            <button type="button" class="btn btn-outline-primary w-100 primary-hover
                             primary-hover-outline position-relative h-100"
                                    data-name-form=" Замовити дзвінок"
                                    data-bs-toggle="modal"
                                    data-bs-target="#call-back-modal">
                                <span>
                                    {{__('home.button.leave_request')}}
                                </span>
                            </button>
                        </form>
                    </div>
                    <div class="col-12 col-md-8 col-xl-5 mt-4 mt-md-0 d-flex align-items-center">
                        <div class="phone text-light d-none">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M4.53282 4.69923C4.69974 4.58795 4.8 4.40061 4.8 4.2V1.8C4.8 0.805887 3.99411 0 3 0H0.6C0.268629 0 0 0.268629 0 0.6C0 6.56468 5.43532 12 11.4 12C11.7314 12 12 11.7314 12 11.4V9C12 8.00589 11.1941 7.2 10.2 7.2H7.8C7.59939 7.2 7.41205 7.30026 7.30077 7.46718L6.15756 9.18199C4.91244 8.37689 3.82155 7.31351 2.98244 6.08938L2.81801 5.84244L4.53282 4.69923ZM8.12111 8.4H10.2C10.5314 8.4 10.8 8.66863 10.8 9V10.7792C9.63766 10.6988 8.50328 10.3879 7.44525 9.89494L7.20246 9.77797L8.12111 8.4ZM1.2208 1.2H3C3.33137 1.2 3.6 1.46863 3.6 1.8V3.87889L2.22203 4.79754C1.66129 3.67107 1.30742 2.45176 1.2208 1.2Z"
                                      fill="#4E5DE3"/>
                            </svg>
                            +380 67 70 21 851
                        </div>
                        <div class="location text-light">
                            <svg width="12" height="14" viewBox="0 0 12 14" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M6 0C9.31371 0 12 2.79001 12 6.23166C12 8.5091 10.1851 10.9171 6.63217 13.5402L6 14L5.61853 13.7236C1.90028 11.0291 0 8.56206 0 6.23166C0 2.79001 2.68629 0 6 0ZM6 1.38481C3.42267 1.38481 1.33333 3.55482 1.33333 6.23166C1.33333 7.9134 2.86448 9.96551 6 12.3073C9.13552 9.96551 10.6667 7.9134 10.6667 6.23166C10.6667 3.55482 8.57733 1.38481 6 1.38481ZM6 2.8C7.47276 2.8 8.66667 4.0536 8.66667 5.6C8.66667 7.1464 7.47276 8.4 6 8.4C4.52724 8.4 3.33333 7.1464 3.33333 5.6C3.33333 4.0536 4.52724 2.8 6 2.8ZM6 4.2C5.26362 4.2 4.66667 4.8268 4.66667 5.6C4.66667 6.3732 5.26362 7 6 7C6.73638 7 7.33333 6.3732 7.33333 5.6C7.33333 4.8268 6.73638 4.2 6 4.2Z"
                                      fill="#4E5DE3"/>
                            </svg>
                            {{__('home.main.address')}}
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-xl-3 btn-group justify-content-around justify-content-md-between">
                        <a href="https://www.instagram.com/tehnobud.pl/">
                            <svg width="47" height="47" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M23.3397 0.0693359C10.4495 0.0693359 0 10.5189 0 23.409C0 36.2992 10.4495 46.7487 23.3397 46.7487C36.2299 46.7487 46.6794 36.2992 46.6794 23.409C46.6794 10.5189 36.2299 0.0693359 23.3397 0.0693359ZM18.2084 11.0369C19.5362 10.9765 19.9604 10.9617 23.3411 10.9617H23.3372C26.7189 10.9617 27.1416 10.9765 28.4694 11.0369C29.7946 11.0976 30.6997 11.3074 31.4932 11.6152C32.3127 11.9329 33.0051 12.3582 33.6975 13.0506C34.39 13.7425 34.8153 14.437 35.1343 15.2557C35.4403 16.0472 35.6503 16.9517 35.7126 18.2769C35.7722 19.6047 35.7878 20.029 35.7878 23.4096C35.7878 26.7903 35.7722 27.2135 35.7126 28.5413C35.6503 29.866 35.4403 30.7708 35.1343 31.5625C34.8153 32.381 34.39 33.0755 33.6975 33.7674C33.0059 34.4598 32.3125 34.8861 31.494 35.2041C30.702 35.5119 29.7964 35.7217 28.4712 35.7824C27.1434 35.8428 26.7205 35.8576 23.3395 35.8576C19.9591 35.8576 19.5351 35.8428 18.2073 35.7824C16.8824 35.7217 15.9776 35.5119 15.1856 35.2041C14.3674 34.8861 13.6729 34.4598 12.9813 33.7674C12.2891 33.0755 11.8638 32.381 11.5456 31.5623C11.238 30.7708 11.0282 29.8662 10.9673 28.541C10.9071 27.2133 10.8921 26.7903 10.8921 23.4096C10.8921 20.029 10.9076 19.6044 10.967 18.2767C11.0267 16.952 11.2367 16.0472 11.5453 15.2554C11.8643 14.437 12.2896 13.7425 12.9821 13.0506C13.674 12.3584 14.3684 11.9331 15.1872 11.6152C15.9786 11.3074 16.8832 11.0976 18.2084 11.0369Z" fill="white"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22.2243 13.2043C22.4411 13.2039 22.6744 13.2041 22.9261 13.2042L23.341 13.2043C26.6646 13.2043 27.0585 13.2162 28.371 13.2759C29.5847 13.3314 30.2434 13.5341 30.6822 13.7045C31.2631 13.9302 31.6772 14.1999 32.1126 14.6355C32.5483 15.0712 32.818 15.4862 33.0442 16.0671C33.2145 16.5053 33.4176 17.164 33.4728 18.3777C33.5325 19.6899 33.5455 20.0841 33.5455 23.4062C33.5455 26.7282 33.5325 27.1224 33.4728 28.4346C33.4173 29.6483 33.2145 30.307 33.0442 30.7453C32.8185 31.3262 32.5483 31.7398 32.1126 32.1752C31.677 32.6109 31.2633 32.8806 30.6822 33.1063C30.2439 33.2774 29.5847 33.4797 28.371 33.5352C27.0588 33.5948 26.6646 33.6078 23.341 33.6078C20.0171 33.6078 19.6232 33.5948 18.311 33.5352C17.0973 33.4792 16.4386 33.2764 15.9995 33.106C15.4186 32.8804 15.0037 32.6107 14.568 32.175C14.1323 31.7393 13.8626 31.3254 13.6365 30.7443C13.4661 30.306 13.263 29.6473 13.2078 28.4336C13.1482 27.1214 13.1362 26.7272 13.1362 23.4031C13.1362 20.0789 13.1482 19.6868 13.2078 18.3746C13.2633 17.1609 13.4661 16.5022 13.6365 16.0634C13.8621 15.4825 14.1323 15.0676 14.568 14.6319C15.0037 14.1962 15.4186 13.9265 15.9995 13.7004C16.4383 13.5292 17.0973 13.327 18.311 13.2712C19.4593 13.2193 19.9043 13.2038 22.2243 13.2012V13.2043ZM29.9857 15.2713C29.161 15.2713 28.4919 15.9396 28.4919 16.7645C28.4919 17.5892 29.161 18.2583 29.9857 18.2583C30.8104 18.2583 31.4795 17.5892 31.4795 16.7645C31.4795 15.9398 30.8104 15.2708 29.9857 15.2708V15.2713ZM16.9484 23.4096C16.9484 19.8794 19.8105 17.0172 23.3407 17.0171C26.8709 17.0171 29.7324 19.8793 29.7324 23.4096C29.7324 26.9399 26.8712 29.8009 23.3409 29.8009C19.8106 29.8009 16.9484 26.9399 16.9484 23.4096Z" fill="white"/>
                                <path d="M23.3407 19.2598C25.6322 19.2598 27.4901 21.1174 27.4901 23.4091C27.4901 25.7006 25.6322 27.5584 23.3407 27.5584C21.049 27.5584 19.1914 25.7006 19.1914 23.4091C19.1914 21.1174 21.049 19.2598 23.3407 19.2598Z" fill="white"/>
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/technobudpl/">
                            <svg width="47" height="48" viewBox="0 0 47 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M47 24C47 10.7438 36.4801 0 23.5 0C10.5199 0 0 10.7438 0 24C0 37.2562 10.5199 48 23.5 48C23.6377 48 23.7754 48 23.9131 47.9906V29.3156H18.8643V23.3063H23.9131V18.8812C23.9131 13.7531 26.9791 10.9594 31.4588 10.9594C33.6068 10.9594 35.452 11.1188 35.9844 11.1938V16.5563H32.9C30.4674 16.5563 29.99 17.7375 29.99 19.4719V23.2969H35.8191L35.0572 29.3063H29.99V47.0719C39.8123 44.1938 47 34.9594 47 24Z" fill="white"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
