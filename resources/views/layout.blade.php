<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreeTalks</title>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- https://fonts.google.com/ -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/templatemo-xtra-blog.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
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
                    <div class="mb-3 mx-auto tm-site-logo">
                        <x-application-logo1/>
                    </div>
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
                                <i class="fa-solid fa-blog"></i>
                                Blog
                            </a></li>
                        @auth
                            <li><a class="{{ Request::routeIs('blog.create') ? 'active' : '' }} tm-nav-link"
                                    href="{{ route('blog.create') }}">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                    Create Blog
                                </a></li>
                        @endauth
                        <li><a href="{{ route('about') }}" class="{{ Request::routeIs('about') ? 'active' : '' }} tm-nav-link">
                                <i class="fa-solid fa-address-card"></i>
                                About Us
                            </a></li>
                        <li><a href="{{ route('contact') }}" class="{{ Request::routeIs('contact') ? 'active' : '' }} tm-nav-link">
                                <i class="fa-solid fa-phone"></i>
                                Contact Us
                            </a></li>
                        @guest
                            <li><a href="{{ route('login') }}" class="{{ Request::routeIs('login') ? 'active' : '' }} tm-nav-link">
                                    <i class="fa-solid fa-right-to-bracket"></i>
                                    Log in
                                </a></li>
                            <li><a href="{{ route('register') }}" class="{{ Request::routeIs('register') ? 'active' : '' }} tm-nav-link">
                                    <i class="fa-solid fa-user-plus"></i>
                                    Register
                                </a></li>
                        @endguest
                        @auth
                            <li><a href="{{ route('dashboard') }}" class="{{ Request::routeIs('dashboard') ? 'active' : '' }} tm-nav-link">
                                    <i class="fa-solid fa-chart-line"></i>
                                    Dashboard
                                </a></li>
                            <li><a href="{{ url('/logout') }}" class="{{ Request::routeIs('logout') ? 'active' : '' }} tm-nav-link">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                    Logout
                                </a></li>
                            @if (Auth::user()->role_as == '1')
                                <li><a href="{{ route('admin.dashboard') }}" class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }} tm-nav-link">
                                        <i class="fa-solid fa-toolbox"></i>
                                        Admin
                                    </a></li>
                            @endif
                        @endauth

                    </ul>
                </nav>
                <div>
                    <a href="https://fb.com" target="_blank" class="tm-social-link">
                        <i class="fab fa-facebook tm-social-icon"></i>
                    </a>
                    <a href="https://twitter.com" target="_blank" class="tm-social-link">
                        <i class="fab fa-twitter tm-social-icon"></i>
                    </a>
                    <a href="https://instagram.com" target="_blank" class="tm-social-link">
                        <i class="fab fa-instagram tm-social-icon"></i>
                    </a>
                    <a href="https://linkedin.com" target="_blank" class="tm-social-link">
                        <i class="fab fa-linkedin tm-social-icon"></i>
                    </a>
                </div>

            </div>
        </header>

        <!-- main -->
        <div class="container-fluid">
            <main class="tm-main">
                @yield('main')
                <footer class="row tm-row">
                    <hr class="col-12">
                    <div class="col-md-6 col-12 tm-color-gray">
                        Design: <a rel="nofollow" target="_parent" href="#"
                            class="tm-external-link">FreeTalks</a>
                    </div>
                    <div class="col-md-6 col-12 tm-color-gray tm-copyright">
                        Copyright 2020 FreeTalks, Inc.
                    </div>
                </footer>
            </main>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
    @yield('scripts')
</body>

</html>
