<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xtra Blog</title>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- https://fonts.google.com/ -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/templatemo-xtra-blog.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <!--
    
TemplateMo 553 Xtra Blog

https://templatemo.com/tm-553-xtra-blog

-->
    @yield('head')
</head>

<body>
    <div id="wrapper">
        <!-- header -->
        <header class="tm-header" id="tm-header">
            <div class="tm-header-wrapper">
                <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="tm-site-header">
                    <div class="mb-3 mx-auto tm-site-logo"><i class="fas fa-times fa-2x"></i></div>
                    <h1 class="text-center">Calicut Blog</h1>
                </div>
                <nav class="tm-nav" id="tm-nav">
                    <ul>
                        <li><a class="{{ Request::routeIs('welcome.index') ? 'active' : '' }} tm-nav-link"
                                href="{{ route('welcome.index') }}">
                                <i class="fas fa-home"></i>
                                Home
                            </a></li>
                        <li><a class="{{ Request::routeIs('blog.index') ? 'active' : '' }} tm-nav-link"
                                href="{{ route('blog.index') }}">
                                <i class="fas fa-home"></i>
                                Blog
                            </a></li>
                        @auth
                            <li><a class="{{ Request::routeIs('blog.create') ? 'active' : '' }} tm-nav-link"
                                    href="{{ route('blog.create') }}">
                                    <i class="fas fa-home"></i>
                                    Create Blog
                                </a></li>
                        @endauth
                        <li><a href="{{ route('about') }}" class="tm-nav-link">
                                <i class="fas fa-users"></i>
                                About Us
                            </a></li>
                        <li><a href="{{ route('contact') }}" class="tm-nav-link">
                                <i class="far fa-comments"></i>
                                Contact Us
                            </a></li>
                        @guest
                            <li><a href="{{ route('login') }}" class="tm-nav-link">
                                    <i class="far fa-comments"></i>
                                    Log in
                                </a></li>
                            <li><a href="{{ route('register') }}" class="tm-nav-link">
                                    <i class="far fa-comments"></i>
                                    Register
                                </a></li>
                        @endguest
                        @auth
                            <li><a href="{{ route('dashboard') }}" class="tm-nav-link">
                                    <i class="far fa-comments"></i>
                                    Dashboard
                                </a></li>
                            <li><a href="{{ url('/logout') }}" class="tm-nav-link">
                                    <i class="far fa-comments"></i>
                                    Logout
                                </a></li>
                        @endauth
                    </ul>
                </nav>
                <div class="tm-mb-65">
                    <a rel="nofollow" href="https://fb.com/templatemo" class="tm-social-link">
                        <i class="fab fa-facebook tm-social-icon"></i>
                    </a>
                    <a href="https://twitter.com" class="tm-social-link">
                        <i class="fab fa-twitter tm-social-icon"></i>
                    </a>
                    <a href="https://instagram.com" class="tm-social-link">
                        <i class="fab fa-instagram tm-social-icon"></i>
                    </a>
                    <a href="https://linkedin.com" class="tm-social-link">
                        <i class="fab fa-linkedin tm-social-icon"></i>
                    </a>
                </div>
                <p class="tm-mb-80 pr-5 text-white">
                    Xtra Blog is a multi-purpose HTML template from TemplateMo website. Left side is a sticky menu bar.
                    Right side content will scroll up and down.
                </p>
            </div>
        </header>
        <!-- Menu Button -->
        {{-- <div class="menuButton">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
      </div> --}}
        <div class="tm-mb-65">
            <a rel="nofollow" href="https://fb.com/templatemo" class="tm-social-link">
                <i class="fab fa-facebook tm-social-icon"></i>
            </a>
            <a href="https://twitter.com" class="tm-social-link">
                <i class="fab fa-twitter tm-social-icon"></i>
            </a>
            <a href="https://instagram.com" class="tm-social-link">
                <i class="fab fa-instagram tm-social-icon"></i>
            </a>
            <a href="https://linkedin.com" class="tm-social-link">
                <i class="fab fa-linkedin tm-social-icon"></i>
            </a>
        </div>
        <!-- main -->
        @yield('main')

        <!-- Main footer -->
        {{-- <footer class="main-footer">
        <div>
          <a href=""><i class="fab fa-facebook-f"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
          <a href=""><i class="fab fa-twitter"></i></a>
        </div>
        <small>&copy 2021 Alphayo Blog</small>
      </footer> --}}
        <footer class="row tm-row">
            <hr class="col-12">
            <div class="col-md-6 col-12 tm-color-gray">
                Design: <a rel="nofollow" target="_parent" href="https://templatemo.com"
                    class="tm-external-link">TemplateMo</a>
            </div>
            <div class="col-md-6 col-12 tm-color-gray tm-copyright">
                Copyright 2020 Xtra Blog Company Co. Ltd.
            </div>
        </footer>
    </div>

    {{-- <!-- Click events to menu and close buttons using javaascript-->
    <script>
      document
        .querySelector(".menuButton")
        .addEventListener("click", function () {
          document.querySelector(".sidebar").style.width = "100%";
          document.querySelector(".sidebar").style.zIndex = "5";
        });

      document
        .querySelector(".closeButton")
        .addEventListener("click", function () {
          document.querySelector(".sidebar").style.width = "0";
        });
    </script> --}}
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
    @yield('scripts')
</body>

</html>
