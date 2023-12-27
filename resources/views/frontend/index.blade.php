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
<body class="template-color-1 spybody white-version" data-spy="scroll" data-bs-target=".navbar-example2" data-offset="150">
    {{-- HEADER --}}
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

    {{-- MOBILE POP UP --}}
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
                <p class="discription">Lorem ipsum dolor sit amet consect adipisicing elit repellendus.
                </p>
            </div>
            <div class="content">
                <ul class="primary-menu nav nav-pills onepagenav">
                    <li class="nav-item current"><a class="nav-link smoth-animation active" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="#experiences">Experience</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="#blog">Blog</a></li>
                </ul>
                <div class="social-share-style-1 mt--40">
                    <span class="title">find with me</span>
                    <ul class="social-share d-flex liststyle">
                        <li class="facebook"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg></a>
                        </li>
                        <li class="instagram"><a href="https://instagram.com/revan.pratamas" target="_BLANK"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram">
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
            </div>
        </div>
    </div>

    {{-- CONTENT --}}
    <main class="main-page-wrapper">
        <div id="home" class="rn-slide-area">
            <div class="slide slider-style-3">
                <div class="container">
                    <div class="row slider-wrapper">
                        <div class="order-2 order-xl-1 col-lg-12 col-xl-5 mt_lg--50 mt_md--50 mt_sm--50">
                            <div class="slider-info">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-12">
                                        <div class="user-info-top">
                                            <div class="user-info-header">
                                                <div class="user">
                                                    <i data-feather="user"></i>
                                                </div>
                                                <h2 class="title">
                                                    Hi, I’m <span>REVAN</span>
                                                </h2>
                                                <p class="disc">Back-End Developer and working for MODENA Indonesia in Jakarta, Indonesia</p>
                                            </div>
                                            <div class="user-info-footer">
                                                <div class="info">
                                                    <i data-feather="file"></i>
                                                    <span>Back-End Developer & Fullstack Developer</span>
                                                </div>
                                                <div class="info">
                                                    <i data-feather="mail"></i>
                                                    <span>revanp0@gmail.com</span>
                                                </div>
                                                <div class="info">
                                                    <i data-feather="map-pin"></i>
                                                    <span>Jakarta, ID</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <div class="user-info-bottom">
                                        <span>Download my curriculum vitae: </span>
                                        <div class="button-wrapper d-flex">
                                            <a class="rn-btn mr--30" href="#contacts"><span>DOWNLOAD CV</span></a>
                                            <a class="rn-btn" href="#contacts"><span>CONTACT ME</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="order-1 order-xl-2 col-lg-12 col-xl-7">
                            <div class="background-image-area">
                                <div class="thumbnail-image">
                                    <img src="{{ asset('public/assets/img/profile.JPG') }}" alt="Personal Portfolio">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-separator rn-section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" class="section-title text-center">
                            <h2 class="title">My Skills</h2>
                        </div>
                    </div>
                </div>
                <div class="row text-center justify-content-center">
                    <div class="inner slide col-lg-8 col-md-12">
                        <div class="skill-share-inner pt--80">
                            <span class="title">Primary Skills on</span>
                            <ul class="skill-share liststyle">
                                <li><img src="{{ asset('public/assets/img/icon/reactjs.svg') }}" alt="ReactJS"></li>
                                <li><img src="{{ asset('public/assets/img/icon/php.svg') }}" alt="PHP"></li>
                                <li><img src="{{ asset('public/assets/img/icon/laravel.svg') }}" alt="Laravel"></li>
                                <li><img src="{{ asset('public/assets/img/icon/docker.svg') }}" alt="Docker"></li>
                                <li><img src="{{ asset('public/assets/img/icon/kubernetes.svg') }}" alt="Kubernetes"></li>
                                <li><img src="{{ asset('public/assets/img/icon/centos.svg') }}" alt="CentOS"></li>
                                <li><img src="{{ asset('public/assets/img/icon/ubuntu.svg') }}" alt="Ubuntu"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- <div id="experiences" class="rn-experience-area section-separator rn-section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" class="section-title text-center">
                            <span class="subtitle">Over 5 years of experience</span>
                            <h2 class="title">My Experiences</h2>
                        </div>
                    </div>
                </div>
                <div class="row mt--10">
                    <div class="col-12 mt_experience">

                        <!-- single skills -->
                        <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" class="experience-style-two">
                            <div class="experience-left">
                                <div class="experience-image">
                                    <img src="assets/images/portfolio/portfolio-01.jpg" alt="Personal Portfolio">
                                </div>
                                <div class="experience-center">
                                    <span class="date">2015-Present</span>
                                    <h4 class="experience-title">
                                        Rainbow - Themes.
                                    </h4>
                                    <h6 class="subtitle">
                                        Co-Founder, Web Designer & Developer
                                    </h6>
                                    <p class="disc">Reinvetning the way you create websites</p>
                                </div>
                            </div>
                            <div class="experience-right">
                                <div class="experience-footer">
                                    <a class="rn-btn" href="#contacts"><span>CONTACT ME</span></a>
                                </div>
                            </div>
                        </div>
                        <!-- single skills -->

                        <!-- single skills -->
                        <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="200" data-aos-once="true" class="experience-style-two">
                            <div class="experience-left">
                                <div class="experience-image">
                                    <img src="assets/images/portfolio/portfolio-02.jpg" alt="Personal Portfolio">
                                </div>
                                <div class="experience-center">
                                    <span class="date">2015-Present</span>
                                    <h4 class="experience-title">
                                        App Development.
                                    </h4>
                                    <h6 class="subtitle">
                                        Co-Founder, Web Designer & Developer
                                    </h6>
                                    <p class="disc">Reinvetning the way you create websites</p>
                                </div>
                            </div>
                            <div class="experience-right">
                                <div class="experience-footer">
                                    <a class="rn-btn" href="#contacts"><span>CONTACT ME</span></a>
                                </div>
                            </div>
                        </div>
                        <!-- single skills -->

                        <!-- single skills -->
                        <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="300" data-aos-once="true" class="experience-style-two">
                            <div class="experience-left">
                                <div class="experience-image">
                                    <img src="assets/images/portfolio/portfolio-03.jpg" alt="Personal Portfolio">
                                </div>
                                <div class="experience-center">
                                    <span class="date">2015-Present</span>
                                    <h4 class="experience-title">
                                        Application Management.
                                    </h4>
                                    <h6 class="subtitle">
                                        Co-Founder, Web Designer & Developer
                                    </h6>
                                    <p class="disc">Reinvetning the way you create websites</p>
                                </div>
                            </div>
                            <div class="experience-right">
                                <div class="experience-footer">
                                    <a class="rn-btn" href="#contacts"><span>CONTACT ME</span></a>
                                </div>
                            </div>
                        </div>
                        <!-- single skills -->

                    </div>
                </div>
            </div>
        </div> --}}
    </main>

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
