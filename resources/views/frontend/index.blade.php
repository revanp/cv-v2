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
                            <li class="nav-item"><a class="nav-link smoth-animation" href="#portfolio">Portfolio</a></li>
                            <li class="nav-item"><a class="nav-link smoth-animation" href="#contacts">Contact Me</a></li>
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
                <p class="discription">Back-End Developer and Available for full-time or freelance opportunities 👋🏻</p>
            </div>
            <div class="content">
                <ul class="primary-menu nav nav-pills onepagenav">
                    <li class="nav-item current"><a class="nav-link smoth-animation active" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="#contacts">Contact Me</a></li>
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
                                                <p class="discription">Back-End Developer and Available for full-time or freelance opportunities 👋🏻</p>
                                            </div>
                                            <div class="user-info-footer">
                                                <div class="info">
                                                    <i data-feather="file"></i>
                                                    <span>Back-End Developer</span>
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
                                            <a class="rn-btn mr--30" href="{{ url('cv') }}" target="_BLANK"><span>DOWNLOAD CV</span></a>
                                            <a class="rn-btn" href="#contacts"><span>CONTACT ME</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="order-1 order-xl-2 col-lg-12 col-xl-7">
                            <div class="background-image-area">
                                <div class="thumbnail-image">
                                    <img src="{{ asset('public/assets/img/profile.jpg') }}" alt="Personal Portfolio">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-separator rn-section-gap" id="skills">
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
                            <span class="title">Best Skills on</span>
                            <ul class="skill-share liststyle">
                                <li><img src="{{ asset('public/assets/img/icon/php.svg') }}" alt="PHP"></li>
                                <li><img src="{{ asset('public/assets/img/icon/reactjs.svg') }}" alt="ReactJS"></li>
                                <li><img src="{{ asset('public/assets/img/icon/laravel.svg') }}" alt="Laravel"></li>
                                <li><img src="{{ asset('public/assets/img/icon/docker.svg') }}" alt="Docker"></li>
                                <li><img src="{{ asset('public/assets/img/icon/kubernetes.svg') }}" alt="Kubernetes"></li>
                                <li><img src="{{ asset('public/assets/img/icon/centos.svg') }}" alt="CentOS"></li>
                                <li><img src="{{ asset('public/assets/img/icon/ubuntu.svg') }}" alt="Ubuntu"></li>
                                <li><img src="{{ asset('public/assets/img/icon/js.svg') }}" alt="Javascript"></li>
                                <li><img src="{{ asset('public/assets/img/icon/flutter.svg') }}" alt="Flutter"></li>
                                <li><img src="{{ asset('public/assets/img/icon/python.svg') }}" alt="Python"></li>
                                <li><img src="{{ asset('public/assets/img/icon/mysql.svg') }}" alt="MySQL"></li>
                                <li><img src="{{ asset('public/assets/img/icon/postgresql.svg') }}" alt="PostgreSQL"></li>
                                <li><img src="{{ asset('public/assets/img/icon/mongodb.svg') }}" alt="MongoDB"></li>
                                <li><img src="{{ asset('public/assets/img/icon/html5.svg') }}" alt="HTML 5"></li>
                                <li><img src="{{ asset('public/assets/img/icon/jenkins.svg') }}" alt="Jenkins"></li>
                                <li><img src="{{ asset('public/assets/img/icon/css.svg') }}" alt="CSS"></li>
                                <li><img src="{{ asset('public/assets/img/icon/sqlserver.svg') }}" alt="Microsoft SQL Server"></li>
                                <li><img src="{{ asset('public/assets/img/icon/apache.svg') }}" alt="Apache"></li>
                                <li><img src="{{ asset('public/assets/img/icon/nginx.svg') }}" alt="Nginx"></li>
                                <li><img src="{{ asset('public/assets/img/icon/codeigniter.svg') }}" alt="Codeigniter"></li>
                                <li><img src="{{ asset('public/assets/img/icon/cakephp.svg') }}" alt="CakePHP"></li>
                                <li><img src="{{ asset('public/assets/img/icon/bootstrap.svg') }}" alt="Bootstrap"></li>
                                <li><img src="{{ asset('public/assets/img/icon/tailwind.svg') }}" alt="Tailwind"></li>
                                <li><img src="{{ asset('public/assets/img/icon/git.svg') }}" alt="Git"></li>
                                <li><img src="{{ asset('public/assets/img/icon/npm.svg') }}" alt="NPM"></li>
                                <li><img src="{{ asset('public/assets/img/icon/figma.svg') }}" alt="Figma"></li>
                                <li><img src="{{ asset('public/assets/img/icon/wordpress.svg') }}" alt="Wordpress"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="portfolio" class="rn-portfolio-area portfolio-style-three rn-section-gap section-separator">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" class="section-title text-center">
                            <span class="subtitle">Visit my portfolio and keep your feedback</span>
                            <h2 class="title">My Portfolio</h2>
                        </div>
                    </div>
                </div>
                <div class="row mt--25 mt_md--5 mt_sm--5">
                    <div class="col-lg-12">
                        <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="200" data-aos-once="true" class="portfolio-wrapper portfolio-slick-activation slick-arrow-style-one rn-slick-dot-style">
                            @foreach ($portofolio as $key => $val)
                                <div class="rn-portfolio-slick">
                                    <div class="rn-portfolio btn-portofolio" data-id="{{ $val->id }}">
                                        <div class="inner">
                                            <div class="thumbnail">
                                                <a href="javascript:void(0)">
                                                    <img src="{{ $val->image->path ?? '#' }}" alt="Personal Portfolio Images">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <div class="category-info">
                                                    <div class="category-list">
                                                        <a href="javascript:void(0)">{{ strtoupper($val->category) }}</a>
                                                    </div>
                                                </div>
                                                <h4 class="title"><a href="javascript:void(0)">{{ strtoupper($val->name) }}</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rn-contact-area rn-section-gap section-separator" id="contacts">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <span class="subtitle">Contact</span>
                            <h2 class="title">Contact With Me</h2>
                        </div>
                    </div>
                </div>

                <div class="row mt--50 mt_md--40 mt_sm--40 mt-contact-sm">
                    <div class="col-lg-5">
                        <div class="contact-about-area">
                            <div class="thumbnail">
                                <img src="{{ asset('public/assets/img/handshake.jpg') }}" alt="contact-img">
                            </div>
                            <div class="title-area">
                                <h4 class="title">Revan Pratama</h4>
                                <span>Back-End Developer</span>
                            </div>
                            <div class="description">
                                <p>I am available for fulltime and freelance work. Connect with me via and feel free to send me an email.
                                </p>
                                <span class="mail">Email: <a href="mailto:revanp0@gmail.com">revanp0@gmail.com</a></span>
                            </div>
                            <div class="social-area">
                                <div class="name">FIND WITH ME</div>
                                <div class="social-icone">
                                    <a href="#"><i data-feather="facebook"></i></a>
                                    <a href="#"><i data-feather="linkedin"></i></a>
                                    <a href="https://instagram.com/revan.pratamas" target="_BLANK"><i data-feather="instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-aos-delay="600" class="col-lg-7 contact-input">
                        <div class="contact-form-wrapper">
                            <div class="introduce">
                                <form class="rnt-contact-form row" id="contact-form" method="POST" action="{{ url('contact') }}">
                                    @csrf
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="contact-name">Your Name</label>
                                            <input class="form-control form-control-lg" name="name" id="contact-name" type="text">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="contact-phone">Phone Number</label>
                                            <input class="form-control" name="phone_number" id="contact-phone" type="text">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="contact-email">Email</label>
                                            <input class="form-control form-control-sm" id="contact-email" name="email" type="email">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="subject">subject</label>
                                            <input class="form-control form-control-sm" id="subject" name="subject" type="text">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="contact-message">Your Message</label>
                                            <textarea name="message" id="contact-message" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <button name="submit" type="submit" id="submit" class="rn-btn">
                                            <span>SEND MESSAGE</span>
                                            <i data-feather="arrow-right"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- FOOTER --}}
    <div id="footer" class="rn-footer-area footer-style-2">
        <div class="copyright text-center ptb--40 section-separator">
            <p class="description">© 2023. All rights reserved by <a target="_blank" href="https://www.revanpratama.online">REVAN PRATAMA</a></p>
        </div>
    </div>

    <div class="modal fade" id="modalPorto" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i data-feather="x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <span class="loader"></span>
                </div>
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
    <script>
        $(".btn-portofolio").click(function() {
            var s = $(this).data("id");
            $("#modalPorto").find('.modal-body').html('<span class="loader"></span>')

            $('#modalPorto').modal('show');
            $.ajax({
                url: "{{ url('portofolio-detail') }}/" + s,
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(s) {
                    $("#modalPorto").find('.modal-body').html(s)
                },
                error: function(s) {
                    var t = s.responseJSON;
                }
            })
        })
    </script>
</body>
</html>
