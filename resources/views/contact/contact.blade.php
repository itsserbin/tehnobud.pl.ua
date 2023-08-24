@extends('layout')

@section('content')
    <section id="contact">
        <div class="container-fluid bg-dark">
            <div class="wrapper-contact">
                <div class="row flex-column flex-md-row">
                    <div class="col-12 col-md-7 bg-white contact description position-relative">
                        <h2 class="contact-title text-uppercase">
                            {{__('contact.title')}}
                        </h2>
                        <div class="row h-100">
                            <div class="contact-items d-flex flex-column justify-content-around">
                                <div class="row contact-item">
                                    <div class="col-12 col-xl-8">
                                        <span class="nav-link contact-link d-flex align-items-center">
                                            <svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0)">
                                                    <path d="M15.8555 13.9729C16.4477 12.723 16.1885 11.2269 15.2108 10.2484L9.55882 4.5972C8.28094 3.3176 6.20468 3.31145 4.91892 4.5972L4.6125 4.90363C4.54844 4.96769 4.54844 5.07152 4.6125 5.13558L14.9175 15.4406C14.9978 15.5208 15.1332 15.4974 15.1818 15.3949L15.8555 13.9729Z"
                                                          fill="#4E5DE3"/>
                                                    <path d="M22.5496 28.731C21.8 29.0861 20.9019 28.9303 20.3146 28.3438L13.6513 21.6797C13.064 21.0932 12.909 20.1951 13.2641 19.4454L14.4367 16.9704C14.4664 16.9077 14.4534 16.8332 14.4044 16.7841L3.68562 6.0653C3.62115 6.00083 3.51559 6.00091 3.45194 6.0662C-1.34945 10.9892 -0.924006 18.2403 3.41184 22.5762L19.4189 38.5833C23.7788 42.943 31.0181 43.3323 35.8932 38.5789C35.9584 38.5153 35.9587 38.4102 35.8944 38.3456L25.2085 27.592C25.1594 27.5427 25.0847 27.5295 25.0219 27.5593L22.5496 28.731Z"
                                                          fill="#4E5DE3"/>
                                                    <path d="M31.7458 26.7838C30.7681 25.8061 29.2721 25.5469 28.0221 26.1383L26.5938 26.8148C26.4915 26.8633 26.4679 26.9984 26.5477 27.0787L36.8225 37.4183C36.8865 37.4827 36.9907 37.4828 37.0549 37.4186L37.3978 37.0757C38.6774 35.7962 38.6774 33.7145 37.3978 32.4358L31.7458 26.7838Z"
                                                          fill="#4E5DE3"/>
                                                    <path d="M20.9988 0C19.9154 0 19.0303 0.874009 19.0303 1.96849C19.0303 3.05362 19.9136 3.93698 20.9988 3.93698C30.4057 3.93698 38.059 11.5903 38.059 20.9972C38.059 21.0349 38.0623 21.0727 38.0688 21.1088C38.1131 21.5607 38.3124 21.9839 38.6356 22.3087C39.8933 23.5609 42.0304 22.6146 41.9952 20.9218C41.9555 9.41766 32.6352 0 20.9988 0Z"
                                                          fill="#4E5DE3"/>
                                                    <path d="M28.2165 20.9972C28.2165 21.0349 28.2198 21.0727 28.2264 21.1087C28.2707 21.5607 28.47 21.9839 28.7931 22.3087C30.0367 23.5468 32.1535 22.6482 32.1535 20.9275C32.1162 14.7944 27.1395 9.84241 20.9988 9.84241C19.9154 9.84241 19.0303 10.7164 19.0303 11.8109C19.0303 12.896 19.9136 13.7794 20.9988 13.7794C24.9784 13.7794 28.2165 17.0176 28.2165 20.9972Z"
                                                          fill="#4E5DE3"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0">
                                                        <rect width="42" height="42" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <span class="d-flex flex-column">
                                                <a class="text-dark fw-bold mx-0 text-decoration-none"
                                                   href="tel:+380674532775">
                                                   +380 67 702 18 51
                                                </a>
                                                <a class="text-dark fw-bold mx-0 text-decoration-none"
                                                   href="tel:+380504683770">
                                                    +380 67 531 02 22
                                                </a>
                                            </span>

                                            <svg class="chevron" width="7" height="13" viewBox="0 0 7 13" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M0.70014 13C0.879332 13 1.05852 12.9292 1.19502 12.7884L6.79474 7.01069C7.06842 6.72831 7.06842 6.27187 6.79474 5.98949L1.19502 0.211789C0.921329 -0.0705962 0.478951 -0.0705962 0.205265 0.211789C-0.0684214 0.494174 -0.0684214 0.950612 0.205265 1.233L5.31011 6.50009L0.205265 11.7672C-0.0684214 12.0496 -0.0684214 12.506 0.205265 12.7884C0.341758 12.9292 0.52095 13 0.70014 13Z"
                                                      fill="#4E5DE3"/>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="row contact-item">
                                    <div class="col-12 col-xl-8">
                                        <a class="nav-link contact-link" href="mailto: tehnobudpl@gmail.com ">
                                            <svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0)">
                                                    <path d="M0.948242 12.5956L4.665 16.2825V11.0534L0.948242 12.5956Z"
                                                          fill="#4E5DE3"/>
                                                    <path d="M41.0517 12.5956L37.335 11.0534V16.2825L41.0517 12.5956Z"
                                                          fill="#4E5DE3"/>
                                                    <path d="M34.874 2.64182C34.874 1.79288 34.1834 1.10217 33.3345 1.10217H8.66554C7.8166 1.10217 7.12598 1.79288 7.12598 2.64182V18.7236L15.1251 26.6586L20.2046 22.3551C20.6636 21.9662 21.3365 21.9662 21.7955 22.3551L26.875 26.6586L34.8741 18.7236V2.64182H34.874ZM27.852 16.1789H14.148C13.4685 16.1789 12.9175 15.628 12.9175 14.9485C12.9175 14.2689 13.4685 13.718 14.148 13.718H27.852C28.5315 13.718 29.0825 14.2689 29.0825 14.9485C29.0825 15.628 28.5315 16.1789 27.852 16.1789ZM27.852 9.57871H14.148C13.4685 9.57871 12.9175 9.02779 12.9175 8.34824C12.9175 7.66869 13.4685 7.11777 14.148 7.11777H27.852C28.5315 7.11777 29.0825 7.66869 29.0825 8.34824C29.0825 9.02779 28.5315 9.57871 27.852 9.57871Z"
                                                          fill="#4E5DE3"/>
                                                    <path d="M0 15.1213V39.4732L13.2403 28.2555L0 15.1213Z"
                                                          fill="#4E5DE3"/>
                                                    <path d="M28.7598 28.2555L42.0001 39.4732V15.1213L28.7598 28.2555Z"
                                                          fill="#4E5DE3"/>
                                                    <path d="M21.0005 24.9067L2.12598 40.8978H39.8751L21.0005 24.9067Z"
                                                          fill="#4E5DE3"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0">
                                                        <rect width="42" height="42" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                            <span class="text-dark fw-bold">
                                    tehnobudpl@gmail.com
                                </span>
                                            <svg class="chevron" width="7" height="13" viewBox="0 0 7 13" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M0.70014 13C0.879332 13 1.05852 12.9292 1.19502 12.7884L6.79474 7.01069C7.06842 6.72831 7.06842 6.27187 6.79474 5.98949L1.19502 0.211789C0.921329 -0.0705962 0.478951 -0.0705962 0.205265 0.211789C-0.0684214 0.494174 -0.0684214 0.950612 0.205265 1.233L5.31011 6.50009L0.205265 11.7672C-0.0684214 12.0496 -0.0684214 12.506 0.205265 12.7884C0.341758 12.9292 0.52095 13 0.70014 13Z"
                                                      fill="#4E5DE3"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="row contact-item">
                                    <div class="col-12 col-xl-8">
                                        <a class="nav-link contact-link" href="https://goo.gl/maps/YsYmbshVtfXf4Puz8"
                                           target="_blank">
                                            <svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0)">
                                                    <path d="M21 0C13.762 0 7.875 5.88697 7.875 13.125C7.875 20.1075 19.7978 35.7455 20.3053 36.407C20.4716 36.624 20.727 36.75 21 36.75C21.273 36.75 21.5285 36.624 21.6947 36.407C22.2023 35.7455 34.125 20.1075 34.125 13.125C34.125 5.88697 28.238 0 21 0ZM21 19.25C17.6225 19.25 14.875 16.5026 14.875 13.125C14.875 9.74745 17.6224 6.99997 21 6.99997C24.3776 6.99997 27.125 9.74745 27.125 13.125C27.125 16.5026 24.3775 19.25 21 19.25Z"
                                                          fill="#4E5DE3"/>
                                                    <path d="M40.978 40.6402L33.978 30.1402C33.8153 29.897 33.5423 29.75 33.25 29.75H28.5162C25.9804 33.6508 23.6337 36.7552 23.0842 37.471C22.5924 38.1133 21.812 38.5 20.9999 38.5C20.1879 38.5 19.4075 38.1133 18.914 37.4693C18.3662 36.7536 16.0177 33.649 13.4837 29.7501H8.74995C8.45767 29.7501 8.18468 29.8971 8.02192 30.1403L1.02195 40.6403C0.843453 40.9081 0.825981 41.2546 0.978231 41.5398C1.13048 41.8216 1.4262 42.0001 1.74998 42.0001H40.25C40.5737 42.0001 40.8694 41.8216 41.02 41.5381C41.174 41.2528 41.1583 40.908 40.978 40.6402Z"
                                                          fill="#4E5DE3"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0">
                                                        <rect width="42" height="42" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                            <span class="text-dark fw-bold">
                                    {{__('contact.city')}}
                                </span>
                                            <svg class="chevron" width="7" height="13" viewBox="0 0 7 13" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M0.70014 13C0.879332 13 1.05852 12.9292 1.19502 12.7884L6.79474 7.01069C7.06842 6.72831 7.06842 6.27187 6.79474 5.98949L1.19502 0.211789C0.921329 -0.0705962 0.478951 -0.0705962 0.205265 0.211789C-0.0684214 0.494174 -0.0684214 0.950612 0.205265 1.233L5.31011 6.50009L0.205265 11.7672C-0.0684214 12.0496 -0.0684214 12.506 0.205265 12.7884C0.341758 12.9292 0.52095 13 0.70014 13Z"
                                                      fill="#4E5DE3"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="row contact-item">
                                    <div class="col-12 col-xl-8">
                                        <a class="nav-link contact-link" href="https://www.facebook.com/technobudpl/">
                                            <svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M39.6792 0.000976562H2.31804C1.03869 0.000976562 0 1.03761 0 2.31906V39.6808C0 40.9623 1.03869 42.0003 2.31804 42.0003H22.4322V25.7357H16.9593V19.3962H22.4322V14.7213C22.4322 9.2975 25.744 6.3425 30.5834 6.3425C32.9035 6.3425 34.893 6.51608 35.4732 6.59146V12.2608L32.1165 12.2622C29.4852 12.2622 28.9776 13.5132 28.9776 15.3479V19.3942H35.2554L34.4345 25.7329H28.9769V41.9982H39.6785C40.9592 41.9982 41.9986 40.9588 41.9986 39.6808V2.31767C41.9979 1.03761 40.9599 0.000976562 39.6792 0.000976562Z"
                                                      fill="#4E5DE3"/>
                                            </svg>

                                            <span class="text-dark fw-bold">
                                    Facebook
                                </span>
                                            <svg class="chevron" width="7" height="13" viewBox="0 0 7 13" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M0.70014 13C0.879332 13 1.05852 12.9292 1.19502 12.7884L6.79474 7.01069C7.06842 6.72831 7.06842 6.27187 6.79474 5.98949L1.19502 0.211789C0.921329 -0.0705962 0.478951 -0.0705962 0.205265 0.211789C-0.0684214 0.494174 -0.0684214 0.950612 0.205265 1.233L5.31011 6.50009L0.205265 11.7672C-0.0684214 12.0496 -0.0684214 12.506 0.205265 12.7884C0.341758 12.9292 0.52095 13 0.70014 13Z"
                                                      fill="#4E5DE3"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="row contact-item">
                                    <div class="col-12 col-xl-8">
                                        <a class="nav-link contact-link" href="https://www.instagram.com/tehnobud.pl/">
                                            <svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0)">
                                                    <path d="M30.4006 13.8883C30.2074 13.3647 29.8991 12.8907 29.4986 12.5017C29.1095 12.1012 28.6359 11.7929 28.112 11.5997C27.6871 11.4347 27.0488 11.2383 25.8732 11.1848C24.6013 11.1268 24.22 11.1143 21.0003 11.1143C17.7803 11.1143 17.3989 11.1264 16.1275 11.1844C14.9518 11.2383 14.3132 11.4347 13.8886 11.5997C13.3647 11.7929 12.8907 12.1012 12.5021 12.5017C12.1015 12.8907 11.7933 13.3643 11.5997 13.8883C11.4347 14.3132 11.2383 14.9518 11.1848 16.1275C11.1268 17.3989 11.1143 17.7803 11.1143 21.0003C11.1143 24.22 11.1268 24.6013 11.1848 25.8732C11.2383 27.0488 11.4347 27.6871 11.5997 28.112C11.7933 28.6359 12.1012 29.1095 12.5017 29.4986C12.8907 29.8991 13.3643 30.2074 13.8883 30.4006C14.3132 30.5659 14.9518 30.7623 16.1275 30.8159C17.3989 30.8739 17.7799 30.886 21 30.886C24.2204 30.886 24.6017 30.8739 25.8728 30.8159C27.0485 30.7623 27.6871 30.5659 28.112 30.4006C29.1637 29.9949 29.9949 29.1637 30.4006 28.112C30.5656 27.6871 30.762 27.0488 30.8159 25.8732C30.8739 24.6013 30.886 24.22 30.886 21.0003C30.886 17.7803 30.8739 17.3989 30.8159 16.1275C30.7623 14.9518 30.5659 14.3132 30.4006 13.8883ZM21.0003 27.1921C17.5803 27.1921 14.8079 24.42 14.8079 21C14.8079 17.58 17.5803 14.8079 21.0003 14.8079C24.42 14.8079 27.1924 17.58 27.1924 21C27.1924 24.42 24.42 27.1921 21.0003 27.1921ZM27.4372 16.0102C26.638 16.0102 25.9901 15.3623 25.9901 14.5631C25.9901 13.7639 26.638 13.116 27.4372 13.116C28.2364 13.116 28.8843 13.7639 28.8843 14.5631C28.884 15.3623 28.2364 16.0102 27.4372 16.0102Z"
                                                          fill="#4E5DE3"/>
                                                    <path d="M25.0195 21C25.0195 23.22 23.22 25.0195 21 25.0195C18.78 25.0195 16.9805 23.22 16.9805 21C16.9805 18.78 18.78 16.9805 21 16.9805C23.22 16.9805 25.0195 18.78 25.0195 21Z"
                                                          fill="#4E5DE3"/>
                                                    <path d="M38.9709 0H3.02907C1.35608 0 0 1.35608 0 3.02907V38.9709C0 40.6439 1.35608 42 3.02907 42H38.9709C40.6439 42 42 40.6439 42 38.9709V3.02907C42 1.35608 40.6439 0 38.9709 0V0ZM32.9859 25.9715C32.9275 27.2552 32.7234 28.1316 32.4254 28.8987C31.799 30.5185 30.5185 31.799 28.8987 32.4254C28.1319 32.7234 27.2552 32.9272 25.9719 32.9859C24.686 33.0445 24.2752 33.0586 21.0003 33.0586C17.7252 33.0586 17.3147 33.0445 16.0285 32.9859C14.7451 32.9272 13.8684 32.7234 13.1016 32.4254C12.2967 32.1226 11.568 31.648 10.9656 31.0344C10.3523 30.4323 9.87772 29.7033 9.57491 28.8987C9.2769 28.1319 9.07278 27.2552 9.01447 25.9719C8.95518 24.6856 8.94141 24.2748 8.94141 21C8.94141 17.7252 8.95518 17.3144 9.01414 16.0285C9.07246 14.7448 9.27626 13.8684 9.57426 13.1013C9.87708 12.2967 10.352 11.5677 10.9656 10.9656C11.5677 10.352 12.2967 9.8774 13.1013 9.57458C13.8684 9.27658 14.7448 9.07278 16.0285 9.01414C17.3144 8.95551 17.7252 8.94141 21 8.94141C24.2748 8.94141 24.6856 8.95551 25.9715 9.01447C27.2552 9.07278 28.1316 9.27658 28.8987 9.57426C29.7033 9.87708 30.4323 10.352 31.0347 10.9656C31.648 11.568 32.1229 12.2967 32.4254 13.1013C32.7237 13.8684 32.9275 14.7448 32.9862 16.0285C33.0448 17.3144 33.0586 17.7252 33.0586 21C33.0586 24.2748 33.0448 24.6856 32.9859 25.9715Z"
                                                          fill="#4E5DE3"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0">
                                                        <rect width="42" height="42" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                            <span class="text-dark fw-bold">
                                    Instagram
                                </span>
                                            <svg class="chevron" width="7" height="13" viewBox="0 0 7 13" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M0.70014 13C0.879332 13 1.05852 12.9292 1.19502 12.7884L6.79474 7.01069C7.06842 6.72831 7.06842 6.27187 6.79474 5.98949L1.19502 0.211789C0.921329 -0.0705962 0.478951 -0.0705962 0.205265 0.211789C-0.0684214 0.494174 -0.0684214 0.950612 0.205265 1.233L5.31011 6.50009L0.205265 11.7672C-0.0684214 12.0496 -0.0684214 12.506 0.205265 12.7884C0.341758 12.9292 0.52095 13 0.70014 13Z"
                                                      fill="#4E5DE3"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="row contact-item">
                                    <div class="col-12 col-xl-8 px-4 px-md-0">
                                        <button type="submit" class="btn btn-outline-primary col-12 col-sm-6 col-lg-3 mt-5 py-3
                                                primary-hover primary-hover-outline position-relative">
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M4.53282 4.69923C4.69974 4.58795 4.8 4.40061 4.8 4.2V1.8C4.8 0.805887 3.99411 0 3 0H0.6C0.268629 0 0 0.268629 0 0.6C0 6.56468 5.43532 12 11.4 12C11.7314 12 12 11.7314 12 11.4V9C12 8.00589 11.1941 7.2 10.2 7.2H7.8C7.59939 7.2 7.41205 7.30026 7.30077 7.46718L6.15756 9.18199C4.91244 8.37689 3.82155 7.31351 2.98244 6.08938L2.81801 5.84244L4.53282 4.69923ZM8.12111 8.4H10.2C10.5314 8.4 10.8 8.66863 10.8 9V10.7792C9.63766 10.6988 8.50328 10.3879 7.44525 9.89494L7.20246 9.77797L8.12111 8.4ZM1.2208 1.2H3C3.33137 1.2 3.6 1.46863 3.6 1.8V3.87889L2.22203 4.79754C1.66129 3.67107 1.30742 2.45176 1.2208 1.2Z"
                                                          fill="#4E5DE3"/>
                                                </svg>

                                                {{__('home.button.leave_request')}}
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 contact position-relative">
                        <div class="wrapper-map">
                            <iframe class="img-map"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2586.5138438883127!2d34.5574721159216!3d49.58805875700556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d825f5400a8677%3A0xc2ae4b9224cb7240!2z0YPQuy4g0JPQvtCz0L7Qu9GPLCA0LCDQn9C-0LvRgtCw0LLQsCwg0J_QvtC70YLQsNCy0YHQutCw0Y8g0L7QsdC70LDRgdGC0YwsIDM2MDAw!5e0!3m2!1sru!2sua!4v1620033236311!5m2!1sru!2sua"
                                    width="600" height="450" style="border:0;" allowfullscreen=""
                                    loading="lazy"></iframe>
                            <img class="img-diagonal position-absolute d-none d-md-block"
                                 src="{{ asset('assets/images/img/diagonal-vertical.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('components.our-news')
@endsection
