<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>REVAN. &#8212; Personal Portofolio</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/feature.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
</head>
<body class="template-color-1 spybody" data-spy="scroll" data-bs-target=".navbar-example2" data-offset="150">
    <header class="rn-header haeder-default black-logo-version header--fixed header--sticky">
        <div class="header-wrapper rn-popup-mobile-menu m--0 row align-items-center">
            <div class="col-lg-2 col-6">
                <div class="header-left">
                    <div class="logo" style="margin-left: 40px">
                        <a href="{{ url('') }}">
                            REVAN.
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-10 col-6">
                <div class="header-center">
                    <nav id="sideNav" class="mainmenu-nav navbar-example2 d-none d-xl-block onepagenav">
                        <ul class="primary-menu nav nav-pills">
                            <li class="nav-item current"><a class="nav-link smoth-animation active" href="#home">Home</a></li>
                            <li class="nav-item"><a class="nav-link smoth-animation" href="#skills">Skills</a></li>
                            <li class="nav-item"><a class="nav-link smoth-animation" href="#experiences">Experience</a></li>
                            <li class="nav-item"><a class="nav-link smoth-animation" href="#blog">Blog</a></li>
                        </ul>
                    </nav>
                    <div class="header-right">
                        <div class="hamberger-menu d-block d-xl-none">
                            <i id="menuBtn" class="humberger-menu">
                                <svg height="50" viewBox="0 0 21 21" width="50" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="m4.5 6.5h12"/><path d="m4.498 10.5h11.997"/><path d="m4.5 14.5h11.995"/></g></svg>
                            </i>
                        </div>

                        <div class="close-menu d-block">
                            <span class="closeTrigger">
                                <i data-feather="x"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="popup-mobile-menu">
        <div class="inner" style="padding-left: 30px; height: inherit">
            <div class="menu-top">
                <div class="menu-header">
                    <div class="logo" style="margin-top:20px;">
                        <a href="{{ url('') }}">
                            REVAN.
                        </a>
                    </div>
                    <div class="close-button">
                        <button class="close-menu-activation close"><i data-feather="x"></i></button>
                    </div>
                </div>
                {{-- <p class="discription">Lorem ipsum dolor sit amet consect adipisicing elit repellendus.
                </p> --}}
            </div>
            <div class="content">
                <ul class="primary-menu nav nav-pills onepagenav">
                    <li class="nav-item current"><a class="nav-link smoth-animation active" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="#experiences">Experience</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="#blog">Blog</a></li>
                </ul>
                <!-- social sharea area -->
                <div class="social-share-style-1 mt--40">
                    <span class="title">find with me</span>
                    <ul class="social-share d-flex liststyle">
                        <li class="facebook"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg></a>
                        </li>
                        <li class="instagram"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                </svg></a>
                        </li>
                        <li class="linkedin"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin">
                                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                    <rect x="2" y="9" width="4" height="12"></rect>
                                    <circle cx="4" cy="4" r="2"></circle>
                                </svg></a>
                        </li>
                    </ul>
                </div>
                <!-- end -->
            </div>
        </div>
    </div>

    <script src="{{ asset('public/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('public/assets/js/modernizer.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('public/assets/js/text-type.js') }}"></script>
    <script src="{{ asset('public/assets/js/wow.js') }}"></script>
    <script src="{{ asset('public/assets/js/aos.js') }}"></script>
    <script src="{{ asset('public/assets/js/particles.js') }}"></script>
    <script src="{{ asset('public/assets/js/jquery-one-page-nav.js') }}"></script>
    <script src="{{ asset('public/assets/js/main.js') }}"></script>
</body>
</html>
