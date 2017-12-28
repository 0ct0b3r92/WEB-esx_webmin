<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Manager - {{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- WebApp Settings -->
    <link rel="apple-touch-icon" href="/custom_icon.png">
    <meta name="apple-mobile-web-app-title" content="{{config('app.name')}}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">


    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{ asset('themes/Sadmin/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/Sadmin/vendors/bower_components/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/Sadmin/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/Sadmin/vendors/bower_components/sweetalert2/dist/sweetalert2.min.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('assets')
    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('themes/Sadmin/css/app.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body data-sa-theme="2">
<main class="main">


    <div class="page-loader">
        <div class="page-loader__spinner">

            <svg viewBox="25 25 50 50"><
                <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>


    <header class="header">
        <div class="navigation-trigger hidden-xl-up" data-sa-action="aside-open" data-sa-target=".sidebar">
            <i class="zmdi zmdi-menu"></i>
        </div>

        <div class="logo hidden-sm-down">
            <h1 class="text-center"><a href="{{ url('/') }}">{{ config('app.name') }}</a></h1>
        </div>

        <ul class="top-nav">
            <li class="hidden-xl-up"><a href="#" data-sa-action="search-open"><i class="zmdi zmdi-search"></i></a></li>


            <li class="dropdown top-nav__notifications">
                <a href="#" data-toggle="dropdown" class="top-nav__notify">
                    <i class="zmdi zmdi-notifications"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu--block">
                    <div class="dropdown-header">
                        Notifications

                        <div class="actions">
                            <a href="#" class="actions__item zmdi zmdi-check-all" data-sa-action="notifications-clear"></a>
                        </div>
                    </div>

                    <div class="listview listview--hover">
                        <div class="listview__scroll scrollbar-inner">
                            <a href="#" class="listview__item">
                                <img src="{{ asset('themes/Sadmin/demo/img/profile-pics/1.jpg') }}" class="listview__img" alt="">

                                <div class="listview__content">
                                    <div class="listview__heading">David Belle</div>
                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                </div>
                            </a>
                            <a href="#" class="listview__item">
                                <img src="{{ asset('themes/Sadmin/demo/img/profile-pics/2.jpg') }}" class="listview__img" alt="">

                                <div class="listview__content">
                                    <div class="listview__heading">Jonathan Morris</div>
                                    <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                                </div>
                            </a>
                            <a href="#" class="listview__item">
                                <img src="{{ asset('themes/Sadmin/demo/img/profile-pics/3.jpg') }}" class="listview__img" alt="">

                                <div class="listview__content">
                                    <div class="listview__heading">Fredric Mitchell Jr.</div>
                                    <p>Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</p>
                                </div>
                            </a>
                            <a href="#" class="listview__item">
                                <img src="{{ asset('themes/Sadmin/demo/img/profile-pics/4.jpg') }}" class="listview__img" alt="">

                                <div class="listview__content">
                                    <div class="listview__heading">Glenn Jecobs</div>
                                    <p>Ut vitae lacus sem ellentesque maximus, nunc sit amet varius dignissim, dui est consectetur neque</p>
                                </div>
                            </a>
                            <a href="#" class="listview__item">
                                <img src="{{ asset('themes/Sadmin/demo/img/profile-pics/5.jpg') }}" class="listview__img" alt="">

                                <div class="listview__content">
                                    <div class="listview__heading">Bill Phillips</div>
                                    <p>Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</p>
                                </div>
                            </a>
                            <a href="#" class="listview__item">
                                <img src="{{ asset('themes/Sadmin/demo/img/profile-pics/1.jpg') }}" class="listview__img" alt="">

                                <div class="listview__content">
                                    <div class="listview__heading">David Belle</div>
                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                </div>
                            </a>
                            <a href="#" class="listview__item">
                                <img src="{{ asset('themes/Sadmin/demo/img/profile-pics/2.jpg') }}" class="listview__img" alt="">

                                <div class="listview__content">
                                    <div class="listview__heading">Jonathan Morris</div>
                                    <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                                </div>
                            </a>
                            <a href="#" class="listview__item">
                                <img src="{{ asset('themes/Sadmin/demo/img/profile-pics/3.jpg') }}" class="listview__img" alt="">

                                <div class="listview__content">
                                    <div class="listview__heading">Fredric Mitchell Jr.</div>
                                    <p>Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</p>
                                </div>
                            </a>
                        </div>

                        <div class="p-1"></div>
                    </div>
                </div>
            </li>


            <li class="dropdown hidden-xs-down">
                <a href="#" data-toggle="dropdown"><i class="zmdi zmdi-apps"></i></a>

                <div class="dropdown-menu dropdown-menu-right dropdown-menu--block" role="menu">
                    <div class="row app-shortcuts">
                        <a class="col-4 app-shortcuts__item" href="#">
                            <i class="zmdi zmdi-calendar"></i>
                            <small class="">Calendar</small>
                        </a>
                        <a class="col-4 app-shortcuts__item" href="#">
                            <i class="zmdi zmdi-file-text"></i>
                            <small class="">Files</small>
                        </a>
                        <a class="col-4 app-shortcuts__item" href="#">
                            <i class="zmdi zmdi-email"></i>
                            <small class="">Email</small>
                        </a>
                        <a class="col-4 app-shortcuts__item" href="#">
                            <i class="zmdi zmdi-trending-up"></i>
                            <small class="">Reports</small>
                        </a>
                        <a class="col-4 app-shortcuts__item" href="#">
                            <i class="zmdi zmdi-view-headline"></i>
                            <small class="">News</small>
                        </a>
                        <a class="col-4 app-shortcuts__item" href="#">
                            <i class="zmdi zmdi-image"></i>
                            <small class="">Gallery</small>
                        </a>
                    </div>
                </div>
            </li>

            <li class="hidden-xs-down">
                <a href="#" class="top-nav__themes" data-sa-action="aside-open" data-sa-target=".themes"><i class="zmdi zmdi-palette"></i></a>
            </li>
        </ul>

        <div class="clock hidden-md-down">
            <div class="time">
                <span class="time__hours"></span>
                <span class="time__min"></span>
                <span class="time__sec"></span>
            </div>
        </div>
    </header>

    <aside class="sidebar">
        <div class="scrollbar-inner">

            <div class="user">
                <div class="user__info" data-toggle="dropdown">
                    <img class="user__img" src="{{ Auth::user()->avatar }}" alt="">
                    <div>
                        <div class="user__name">{{ Auth::user()->username }}</div>
                        <div class="user__email"></div>
                    </div>
                </div>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Votre Profil</a>
                    <a class="dropdown-item" href="#">Options</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                        Déconnexion
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>

            <ul class="navigation">
                @include('layouts.sidebar')
            </ul>
        </div>
    </aside>

    <div class="themes">
        <div class="scrollbar-inner">

            <a href="#" class="themes__item" data-sa-value="1"><img src="{{ asset('themes/Sadmin/img/bg/1.jpg') }}" alt=""></a>
            <a href="#" class="themes__item active" data-sa-value="2"><img src="{{ asset('themes/Sadmin/img/bg/2.jpg') }}" alt=""></a>
            <a href="#" class="themes__item" data-sa-value="3"><img src="{{ asset('themes/Sadmin/img/bg/3.jpg') }}" alt=""></a>
            <a href="#" class="themes__item" data-sa-value="4"><img src="{{ asset('themes/Sadmin/img/bg/4.jpg') }}" alt=""></a>
            <a href="#" class="themes__item" data-sa-value="5"><img src="{{ asset('themes/Sadmin/img/bg/5.jpg') }}" alt=""></a>
            <a href="#" class="themes__item" data-sa-value="6"><img src="{{ asset('themes/Sadmin/img/bg/6.jpg') }}" alt=""></a>
            <a href="#" class="themes__item" data-sa-value="7"><img src="{{ asset('themes/Sadmin/img/bg/7.jpg') }}" alt=""></a>
            <a href="#" class="themes__item" data-sa-value="8"><img src="{{ asset('themes/Sadmin/img/bg/8.jpg') }}" alt=""></a>
            <a href="#" class="themes__item" data-sa-value="9"><img src="{{ asset('themes/Sadmin/img/bg/9.jpg') }}" alt=""></a>
            <a href="#" class="themes__item" data-sa-value="10"><img src="{{ asset('themes/Sadmin/img/bg/10.jpg') }}" alt=""></a>

        </div>
    </div>

    <section class="content">
        <div class="content__inner ">

            @yield('content')

            <footer class="footer hidden-xs-down">
                <p>© {{ Config('app.name') }} All rights reserved.</p>

                <ul class="nav footer__nav">
                    <a class="nav-link" href="#">Accueil</a>

                    <a class="nav-link" href="#">Support</a>

                    <a class="nav-link" href="#">Nous Contacter</a>
                </ul>
            </footer>
        </div>
    </section>
</main>

<!-- Older IE warning message -->
<!--[if IE]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade to any of the following web browsers to access this website.</p>

    <div class="ie-warning__downloads">
        <a href="http://www.google.com/chrome">
            <img src="img/browsers/chrome.png" alt="">
        </a>

        <a href="https://www.mozilla.org/en-US/firefox/new">
            <img src="img/browsers/firefox.png" alt="">
        </a>

        <a href="http://www.opera.com">
            <img src="img/browsers/opera.png" alt="">
        </a>

        <a href="https://support.apple.com/downloads/safari">
            <img src="img/browsers/safari.png" alt="">
        </a>

        <a href="https://www.microsoft.com/en-us/windows/microsoft-edge">
            <img src="img/browsers/edge.png" alt="">
        </a>

        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
            <img src="img/browsers/ie.png" alt="">
        </a>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->

<!-- Javascript -->
<!-- Vendors -->
<script src="{{ asset('themes/Sadmin/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('themes/Sadmin/vendors/bower_components/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('themes/Sadmin/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('themes/Sadmin/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('themes/Sadmin/vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js') }}"></script>

<!-- Notification et Modal -->
<script src="{{ asset('themes/Sadmin/vendors/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('themes/Sadmin/vendors/bower_components/sweetalert2/dist/sweetalert2.min.js') }}"></script>

<!-- Javascrip pour les pages -->
@yield('javascript')
<!-- App functions and actions -->
<script src="{{ asset('themes/Sadmin/js/api.min.js') }}"></script>
<script src="{{ asset('themes/Sadmin/js/modal.js') }}"></script>
<script src="{{ asset('themes/Sadmin/js/app.min.js') }}"></script>

</body>
</html>