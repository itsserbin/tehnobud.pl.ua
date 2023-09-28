<header id="header">
    <nav class="navbar navbar-expand-xl navbar-dark">
        <div class="container">
            <div itemscope itemtype="http://schema.org/Organization">
                @if(checkCurrentUrl('/') !== 'active')
                    <a itemprop="url" class="navbar-brand" href="{{localUrl("/")}}">
                        <img loading="lazy" itemprop="logo" src="{{ asset('assets/images/icon/logo.png') }}" alt="Techobud">
                        <span class="logo-text text-uppercase fw-bold">{{__('home.main.logo')}}</span>
                    </a>
                @else
                    <span class="navbar-brand">
                        <img loading="lazy" itemprop="logo" src="{{ asset('assets/images/icon/logo.png') }}" alt="Techobud">
                        <span class="logo-text text-uppercase fw-bold">{{__('home.main.logo')}}</span>
                    </span>
                @endif
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        @if(checkCurrentUrl('/') !== 'active')
                            <a class="nav-link link-light {{checkCurrentUrl('/')}}" aria-current="page"
                               href="{{localUrl("/")}}">
                            <span class="d-block d-xl-none">
                                <svg width="28" height="30" viewBox="0 0 28 30" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.95358 27.4414V23.0966C9.95356 21.9957 10.8488 21.1012 11.9577 21.0943H16.0295C17.1434 21.0943 18.0463 21.9908 18.0463 23.0966V27.4288C18.0463 28.3837 18.8223 29.1597 19.7841 29.1667H22.562C23.8594 29.17 25.1049 28.6607 26.0234 27.751C26.942 26.8414 27.4583 25.6063 27.4583 24.3182V11.9767C27.4583 10.9362 26.9937 9.94922 26.1898 9.28167L16.7525 1.78859C15.1029 0.477964 12.7467 0.520302 11.1459 1.88933L1.91156 9.28167C1.06968 9.92954 0.566492 10.9194 0.541626 11.9767V24.3056C0.541626 26.9903 2.73375 29.1667 5.43787 29.1667H8.15237C8.61545 29.17 9.06073 28.9897 9.38938 28.6658C9.71803 28.3419 9.90285 27.9011 9.90284 27.4414H9.95358Z"
                                          fill="#4E5DE3"/>
                                </svg>
                            </span>
                                {{__('home.menu.catalog')}}
                            </a>
                        @else
                            <span class="nav-link link-light {{checkCurrentUrl('/')}}" aria-current="page">
                            <span class="d-block d-xl-none">
                                <svg width="28" height="30" viewBox="0 0 28 30" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.95358 27.4414V23.0966C9.95356 21.9957 10.8488 21.1012 11.9577 21.0943H16.0295C17.1434 21.0943 18.0463 21.9908 18.0463 23.0966V27.4288C18.0463 28.3837 18.8223 29.1597 19.7841 29.1667H22.562C23.8594 29.17 25.1049 28.6607 26.0234 27.751C26.942 26.8414 27.4583 25.6063 27.4583 24.3182V11.9767C27.4583 10.9362 26.9937 9.94922 26.1898 9.28167L16.7525 1.78859C15.1029 0.477964 12.7467 0.520302 11.1459 1.88933L1.91156 9.28167C1.06968 9.92954 0.566492 10.9194 0.541626 11.9767V24.3056C0.541626 26.9903 2.73375 29.1667 5.43787 29.1667H8.15237C8.61545 29.17 9.06073 28.9897 9.38938 28.6658C9.71803 28.3419 9.90285 27.9011 9.90284 27.4414H9.95358Z"
                                          fill="#4E5DE3"/>
                                </svg>
                            </span>
                                {{__('home.menu.catalog')}}
                            </span>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if(checkCurrentUrl('service') !== 'active')
                            <a class="nav-link link-light {{checkCurrentUrl('service')}}"
                               href="{{localUrl("/service")}}">
                            <span class="d-block d-xl-none">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1646 2.98523C12.2149 2.98523 11.407 3.64514 11.1802 4.53459H18.8057C18.5789 3.64514 17.771 2.98523 16.8214 2.98523H13.1646ZM20.9601 4.53462H23.7665C26.743 4.53462 29.1667 6.98777 29.1667 10.0004C29.1667 10.0004 29.0817 11.2758 29.0533 13.0518C29.0505 13.1924 28.9825 13.3301 28.8705 13.4133C28.1887 13.9169 27.5651 14.3329 27.5084 14.3616C25.1555 15.9396 22.4214 17.05 19.5087 17.6023C19.3188 17.6396 19.1317 17.5406 19.0353 17.3713C18.2189 15.9568 16.6938 15.0358 14.993 15.0358C13.3034 15.0358 11.7642 15.9468 10.9237 17.3627C10.8259 17.5292 10.6416 17.6253 10.4531 17.5894C7.56449 17.0357 4.83037 15.9267 2.4917 14.3759L1.13102 13.4291C1.01763 13.3574 0.946764 13.2282 0.946764 13.0848C0.904243 12.3531 0.833374 10.0004 0.833374 10.0004C0.833374 6.98777 3.25709 4.53462 6.23357 4.53462H9.0258C9.29511 2.45446 11.0385 0.833374 13.1645 0.833374H16.8214C18.9474 0.833374 20.6908 2.45446 20.9601 4.53462ZM28.6848 16.1549L28.6281 16.1836C25.765 18.106 22.3208 19.3828 18.7065 19.9136C18.1962 19.9853 17.686 19.6553 17.5443 19.1389C17.2324 17.9625 16.2261 17.1878 15.0213 17.1878H15.0072H14.9788C13.774 17.1878 12.7677 17.9625 12.4559 19.1389C12.3141 19.6553 11.8039 19.9853 11.2936 19.9136C7.67932 19.3828 4.2351 18.106 1.372 16.1836C1.35783 16.1693 1.21609 16.0832 1.1027 16.1549C0.975135 16.2267 0.975135 16.3988 0.975135 16.3988L1.07435 23.7152C1.07435 26.7279 3.48389 29.1667 6.46038 29.1667H23.5256C26.5021 29.1667 28.9116 26.7279 28.9116 23.7152L29.025 16.3988C29.025 16.3988 29.025 16.2267 28.8974 16.1549C28.8266 16.1119 28.7415 16.1262 28.6848 16.1549ZM16.056 22.1659C16.056 22.7684 15.5883 23.2418 14.993 23.2418C14.4118 23.2418 13.9299 22.7684 13.9299 22.1659V20.3153C13.9299 19.7271 14.4118 19.2393 14.993 19.2393C15.5883 19.2393 16.056 19.7271 16.056 20.3153V22.1659Z" fill="#4E5DE3"/>
                                </svg>
                            </span>
                                {{__('home.menu.service')}}
                            </a>
                        @else
                            <span class="nav-link link-light {{checkCurrentUrl('service')}}">
                            <span class="d-block d-xl-none">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1646 2.98523C12.2149 2.98523 11.407 3.64514 11.1802 4.53459H18.8057C18.5789 3.64514 17.771 2.98523 16.8214 2.98523H13.1646ZM20.9601 4.53462H23.7665C26.743 4.53462 29.1667 6.98777 29.1667 10.0004C29.1667 10.0004 29.0817 11.2758 29.0533 13.0518C29.0505 13.1924 28.9825 13.3301 28.8705 13.4133C28.1887 13.9169 27.5651 14.3329 27.5084 14.3616C25.1555 15.9396 22.4214 17.05 19.5087 17.6023C19.3188 17.6396 19.1317 17.5406 19.0353 17.3713C18.2189 15.9568 16.6938 15.0358 14.993 15.0358C13.3034 15.0358 11.7642 15.9468 10.9237 17.3627C10.8259 17.5292 10.6416 17.6253 10.4531 17.5894C7.56449 17.0357 4.83037 15.9267 2.4917 14.3759L1.13102 13.4291C1.01763 13.3574 0.946764 13.2282 0.946764 13.0848C0.904243 12.3531 0.833374 10.0004 0.833374 10.0004C0.833374 6.98777 3.25709 4.53462 6.23357 4.53462H9.0258C9.29511 2.45446 11.0385 0.833374 13.1645 0.833374H16.8214C18.9474 0.833374 20.6908 2.45446 20.9601 4.53462ZM28.6848 16.1549L28.6281 16.1836C25.765 18.106 22.3208 19.3828 18.7065 19.9136C18.1962 19.9853 17.686 19.6553 17.5443 19.1389C17.2324 17.9625 16.2261 17.1878 15.0213 17.1878H15.0072H14.9788C13.774 17.1878 12.7677 17.9625 12.4559 19.1389C12.3141 19.6553 11.8039 19.9853 11.2936 19.9136C7.67932 19.3828 4.2351 18.106 1.372 16.1836C1.35783 16.1693 1.21609 16.0832 1.1027 16.1549C0.975135 16.2267 0.975135 16.3988 0.975135 16.3988L1.07435 23.7152C1.07435 26.7279 3.48389 29.1667 6.46038 29.1667H23.5256C26.5021 29.1667 28.9116 26.7279 28.9116 23.7152L29.025 16.3988C29.025 16.3988 29.025 16.2267 28.8974 16.1549C28.8266 16.1119 28.7415 16.1262 28.6848 16.1549ZM16.056 22.1659C16.056 22.7684 15.5883 23.2418 14.993 23.2418C14.4118 23.2418 13.9299 22.7684 13.9299 22.1659V20.3153C13.9299 19.7271 14.4118 19.2393 14.993 19.2393C15.5883 19.2393 16.056 19.7271 16.056 20.3153V22.1659Z" fill="#4E5DE3"/>
                                </svg>
                            </span>
                                {{__('home.menu.service')}}
                            </span>
                        @endif

                    </li>
                    <li class="nav-item">
                        @if(checkCurrentUrl('about-us') !== 'active')
                            <a class="nav-link link-light {{checkCurrentUrl('about-us')}}"
                               href="{{localUrl("/about-us")}}">
                            <span class="d-block d-xl-none">
                                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="Iconly/Bold/Info Circle">
                                    <g id="Info Circle">
                                    <path id="Info Circle_2" fill-rule="evenodd" clip-rule="evenodd" d="M31.1665 17.0011C31.1665 24.8196 24.8198 31.1677 16.9998 31.1677C9.16567 31.1677 2.83317 24.8196 2.83317 17.0011C2.83317 9.17964 9.16567 2.83439 16.9998 2.83439C24.8198 2.83439 31.1665 9.17964 31.1665 17.0011ZM18.2465 22.3702C18.2465 23.0488 17.6798 23.6169 16.9998 23.6169C16.3198 23.6169 15.7673 23.0488 15.7673 22.3702L15.7673 16.1086C15.7673 15.4272 16.3198 14.8761 16.9998 14.8761C17.6798 14.8761 18.2465 15.4272 18.2465 16.1086L18.2465 22.3702ZM16.9857 10.3696C17.6798 10.3696 18.2323 10.9363 18.2323 11.6163C18.2323 12.2963 17.6798 12.8488 16.9998 12.8488C16.3057 12.8488 15.7532 12.2963 15.7532 11.6163C15.7532 10.9363 16.3057 10.3696 16.9857 10.3696Z" fill="#4E5DE3"/>
                                    </g>
                                    </g>
                                </svg>
                            </span>
                                {{__('home.menu.about')}}
                            </a>
                        @else
                            <span class="nav-link link-light {{checkCurrentUrl('about-us')}}">
                            <span class="d-block d-xl-none">
                                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="Iconly/Bold/Info Circle">
                                    <g id="Info Circle">
                                    <path id="Info Circle_2" fill-rule="evenodd" clip-rule="evenodd" d="M31.1665 17.0011C31.1665 24.8196 24.8198 31.1677 16.9998 31.1677C9.16567 31.1677 2.83317 24.8196 2.83317 17.0011C2.83317 9.17964 9.16567 2.83439 16.9998 2.83439C24.8198 2.83439 31.1665 9.17964 31.1665 17.0011ZM18.2465 22.3702C18.2465 23.0488 17.6798 23.6169 16.9998 23.6169C16.3198 23.6169 15.7673 23.0488 15.7673 22.3702L15.7673 16.1086C15.7673 15.4272 16.3198 14.8761 16.9998 14.8761C17.6798 14.8761 18.2465 15.4272 18.2465 16.1086L18.2465 22.3702ZM16.9857 10.3696C17.6798 10.3696 18.2323 10.9363 18.2323 11.6163C18.2323 12.2963 17.6798 12.8488 16.9998 12.8488C16.3057 12.8488 15.7532 12.2963 15.7532 11.6163C15.7532 10.9363 16.3057 10.3696 16.9857 10.3696Z" fill="#4E5DE3"/>
                                    </g>
                                    </g>
                                </svg>
                            </span>
                                {{__('home.menu.about')}}
                            </span>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if(checkCurrentUrl('contact') !== 'active')
                            <a class="nav-link link-light {{checkCurrentUrl('contact')}}"
                               href="{{localUrl("/contact")}}">
                            <span class="d-block d-xl-none">
                                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="Iconly/Bold/Calling">
                                    <g id="Group">
                                    <g id="Calling">
                                    <path id="Fill 1" d="M20.426 7.77744C19.7516 7.65286 19.1322 8.08323 19.0038 8.74153C18.8754 9.39983 19.3071 10.0426 19.9632 10.1714C21.9384 10.5565 23.4635 12.0854 23.8501 14.0674V14.0688C23.9602 14.6393 24.4624 15.0541 25.0409 15.0541C25.1185 15.0541 25.1961 15.047 25.2751 15.0329C25.9311 14.9012 26.3629 14.2599 26.2345 13.6002C25.6574 10.64 23.3789 8.35363 20.426 7.77744Z" fill="#4E5DE3"/>
                                    <path id="Fill 3" d="M20.3377 2.84461C20.0217 2.79931 19.7043 2.89274 19.4517 3.09377C19.1921 3.29763 19.0299 3.59209 18.9946 3.92195C18.9198 4.58874 19.4009 5.19183 20.0669 5.26686C24.6592 5.77934 28.2287 9.3568 28.7451 13.9635C28.8142 14.5807 29.332 15.0465 29.9499 15.0465C29.9965 15.0465 30.0416 15.0436 30.0882 15.038C30.4113 15.0026 30.6991 14.8426 30.9023 14.5878C31.104 14.333 31.1957 14.0159 31.159 13.6917C30.5157 7.94394 26.0672 3.48309 20.3377 2.84461Z" fill="#4E5DE3"/>
                                    </g>
                                    </g>
                                    <g id="Call">
                                    <path id="Stroke 1" fill-rule="evenodd" clip-rule="evenodd" d="M15.6283 18.3775C21.2795 24.0272 22.5616 17.4912 26.1597 21.0868C29.6286 24.5547 31.6223 25.2495 27.2273 29.6434C26.6768 30.0858 23.179 35.4085 10.8866 23.1195C-1.40739 10.829 3.91229 7.32763 4.35483 6.77726C8.76052 2.37128 9.44335 4.37663 12.9122 7.84455C16.5104 11.4417 9.97714 12.7279 15.6283 18.3775Z" fill="#4E5DE3"/>
                                    </g>
                                    </g>
                                </svg>
                            </span>
                                {{__('home.menu.contact')}}</a>
                        @else
                            <span class="nav-link link-light {{checkCurrentUrl('contact')}}">
                            <span class="d-block d-xl-none">
                                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="Iconly/Bold/Calling">
                                    <g id="Group">
                                    <g id="Calling">
                                    <path id="Fill 1" d="M20.426 7.77744C19.7516 7.65286 19.1322 8.08323 19.0038 8.74153C18.8754 9.39983 19.3071 10.0426 19.9632 10.1714C21.9384 10.5565 23.4635 12.0854 23.8501 14.0674V14.0688C23.9602 14.6393 24.4624 15.0541 25.0409 15.0541C25.1185 15.0541 25.1961 15.047 25.2751 15.0329C25.9311 14.9012 26.3629 14.2599 26.2345 13.6002C25.6574 10.64 23.3789 8.35363 20.426 7.77744Z" fill="#4E5DE3"/>
                                    <path id="Fill 3" d="M20.3377 2.84461C20.0217 2.79931 19.7043 2.89274 19.4517 3.09377C19.1921 3.29763 19.0299 3.59209 18.9946 3.92195C18.9198 4.58874 19.4009 5.19183 20.0669 5.26686C24.6592 5.77934 28.2287 9.3568 28.7451 13.9635C28.8142 14.5807 29.332 15.0465 29.9499 15.0465C29.9965 15.0465 30.0416 15.0436 30.0882 15.038C30.4113 15.0026 30.6991 14.8426 30.9023 14.5878C31.104 14.333 31.1957 14.0159 31.159 13.6917C30.5157 7.94394 26.0672 3.48309 20.3377 2.84461Z" fill="#4E5DE3"/>
                                    </g>
                                    </g>
                                    <g id="Call">
                                    <path id="Stroke 1" fill-rule="evenodd" clip-rule="evenodd" d="M15.6283 18.3775C21.2795 24.0272 22.5616 17.4912 26.1597 21.0868C29.6286 24.5547 31.6223 25.2495 27.2273 29.6434C26.6768 30.0858 23.179 35.4085 10.8866 23.1195C-1.40739 10.829 3.91229 7.32763 4.35483 6.77726C8.76052 2.37128 9.44335 4.37663 12.9122 7.84455C16.5104 11.4417 9.97714 12.7279 15.6283 18.3775Z" fill="#4E5DE3"/>
                                    </g>
                                    </g>
                                </svg>

                            </span>
                                {{__('home.menu.contact')}}</span>
                        @endif

                    </li>
                </ul>

                <div class="btn-toolbar d-none d-xl-block" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group me-2" role="group" aria-label="First group">
                        <button type="button" class="btn btn-primary px-4 primary-hover"
                                data-bs-toggle="modal"
                                data-name-form=" Замовити дзвінок"
                                data-bs-target="#call-back-modal">
                            <span>
                                <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M15.3 0C16.7912 0 18 1.17525 18 2.625V11.375C18 12.8247 16.7912 14 15.3 14H2.7C1.20883 14 0 12.8247 0 11.375V2.625C0 1.17525 1.20883 0 2.7 0H15.3ZM16.2 2.912L9.59265 8.5335C9.28161 8.79811 8.82995 8.82016 8.49547 8.59966L8.40735 8.5335L1.8 2.91287V11.375C1.8 11.8582 2.20294 12.25 2.7 12.25H15.3C15.7971 12.25 16.2 11.8582 16.2 11.375V2.912ZM14.832 1.75H3.1662L9 6.71233L14.832 1.75Z"
                                      fill="white"/>
                                </svg>
                                {{__('home.button.leave_request')}}
                            </span>
                        </button>
                    </div>
                    <div class="btn-group me-2" role="group" aria-label="Second group">
                        @if(!isCurrentLang('ua'))
                            <a href="{{$url ?? changeLang('ua')}}" class="btn {{checkCurrentLang('ua')}}">Укр</a>
                        @else
                            <span class="btn {{checkCurrentLang('ua')}}">Укр</span>
                        @endif
                    </div>
                    <div class="btn-group" role="group" aria-label="Third group">
                        @if(!isCurrentLang('ru'))
                            <a href="{{$url ?? changeLang('ru')}}" class="btn {{checkCurrentLang('ru')}}">Рус</a>
                        @else
                            <span class="btn {{checkCurrentLang('ru')}}">Рус</span>
                        @endif
                    </div>
                </div>

                <div class="btn-toolbar d-block d-xl-none" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="row justify-content-between btn-toolbar-wrapper">
                        <div class="btn-group p-0" role="group" aria-label="Second group">
                            @if(!isCurrentLang('ua'))
                                <a href="{{$url ?? changeLang('ua')}}" class="btn {{checkCurrentLang('ua')}}">Укр</a>
                            @else
                                <span class="btn {{checkCurrentLang('ua')}}">Укр</span>
                            @endif
                        </div>
                        <div class="btn-group p-0" role="group" aria-label="Third group">
                            @if(!isCurrentLang('ru'))
                                <a href="{{$url ?? changeLang('ru')}}" class="btn {{checkCurrentLang('ru')}}">Рус</a>
                            @else
                                <span class="btn {{checkCurrentLang('ru')}}">Рус</span>
                            @endif
                        </div>
                        <div class="btn-group p-0" role="group" aria-label="First group">
                            <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal"
                                    data-bs-target="#call-back-modal">
                                <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M15.3 0C16.7912 0 18 1.17525 18 2.625V11.375C18 12.8247 16.7912 14 15.3 14H2.7C1.20883 14 0 12.8247 0 11.375V2.625C0 1.17525 1.20883 0 2.7 0H15.3ZM16.2 2.912L9.59265 8.5335C9.28161 8.79811 8.82995 8.82016 8.49547 8.59966L8.40735 8.5335L1.8 2.91287V11.375C1.8 11.8582 2.20294 12.25 2.7 12.25H15.3C15.7971 12.25 16.2 11.8582 16.2 11.375V2.912ZM14.832 1.75H3.1662L9 6.71233L14.832 1.75Z"
                                          fill="white"/>
                                </svg>
                                {{__('home.button.leave_request')}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
