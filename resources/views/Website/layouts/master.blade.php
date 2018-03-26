<!DOCTYPE html>
<html lang="en-US">
<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ Config('app.name') }} | @yield('title')</title>

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" href="/favicon.ico"> -->

    <!-- Bootstrap Core CSS, FontAwesome, Fonts -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset("css/style.css")}}" rel="stylesheet">
    <link href="{{asset("css/style.css")}}" rel="stylesheet">

    <!-- Fixes and mobile -->
    <link href="{{ asset('css/bootstrap-fixes.css') }}" rel="stylesheet">

    <!-- LayerSlider stylesheet -->
    <link rel="stylesheet" href="{{ asset('layerslider/css/layerslider.css') }}" type="text/css">

    <!-- Important Owl stylesheet -->
    <link rel="stylesheet" href="{{ asset('owl-carousel/owl.carousel.css') }}">

    <!-- Default Theme -->
    <link rel="stylesheet" href="{{ asset('owl-carousel/owl.theme.css') }}">


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{ asset('owl-carousel/owl.carousel.js') }}"></script>


    <!-- External libraries: jQuery & GreenSock -->
    <script src="{{ asset('layerslider/js/greensock.js') }}" type="text/javascript"></script>



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="@yield('body-class')">
<!-- top header -->
<div class="navbar-wrapper container-fluid">

    <div class="col-lg-4">
        <div class="social-top">
            <a href="" target="_blank"><i class="fa fa-microphone"> Rejoindre Discord</i></a>
        </div>
    </div>
    <div class="logo col-lg-4 col-md-4">
        <a class="brand" href="{{ url('/') }}"><img alt="logo" src="{{ asset('images/logo.png') }}"></a>
    </div>
    <div class="login-info">
        @if(Auth::check())
            @if(Auth::user()->isAdmin)
                <a class="register-btn" href="{{ route('manager.index') }}"><i class="fa fa-cogs"></i><span>Administration</span></a>
            @else
                <a class="register-btn"  data-url="{{ route('report.index') }}" data-toggle="modal" data-target="#Modal" href="#"><i class="fa fa-user"></i><span>Envoyer une demande</span></a>
            @endif
            <a class="register-btn" href="{{route('profile.index')}}"><i class="fa fa-user"></i><span>{{ Auth::user()->username }}</span></a>

            <a class="login-btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" ><i class="fa fa-lock" ></i>  <span>Deconnexion</span></a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @else
            <a class="login-btn" href="{{ route('login') }}"><i class="fa fa-lock" ></i>  <span>Se connecter via Steam</span></a>
        @endif
    </div>
</div>


<!-- main navigation -->
<nav class="navbar navbar-inverse container-fluid header-navigation-wrapper">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#header-menu" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="header-menu">
            <ul class="nav navbar-nav header-menu-navigation">

                <li><a href="{{ url('/') }}" class="no-dropdown"><i class="header-menu-icon fa fa-home"></i><span class="header-menu-text">Accueil</span></a></li>
                <li><a href="{{ route('event.index') }}" class="no-dropdown"><i class="header-menu-icon fa fa-gamepad"></i><span class="header-menu-text">Évenements</span></a></li>
                @if($forum = false)
                <li><a href="{{ route('forum.index') }}" class="no-dropdown"><i class="header-menu-icon fa fa-archive"></i><span class="header-menu-text">Forum</span></a></li>
                @endif
                <li><a href="{{ route('jobs.index') }}" class="no-dropdown"><i class="header-menu-icon fa fa-building"></i><span class="header-menu-text">Nos Emplois</span></a></li>
                <li><a href="{{ route('posts.index') }}" class="no-dropdown"><i class="header-menu-icon fa fa-newspaper-o"></i><span class="header-menu-text">Le Journal de la ville</span></a></li>

            </ul>
        </div>

    </div>
</nav>



@yield('content')

<div class="container-fluid copyright">
    <div class="container">
        <p>&copy; {{ Config('app.name') }} {{ date('Y') }}</p>
        <div class="footer-social">
            Made with a lot of <i class="fa fa-heart" style="color: red"></i> and <i style="color: saddlebrown" class="fa fa-coffee"></i> by <a href="http://github.com/mrlutin">Mr.Lutin 🎄</a>
        </div>
    </div>
</div>


@if(Route::currentRouteName() != 'home')
<div class="container back-to-top-wrapper">
    <a href="#" class="back-to-top" id="scroll"></a>
</div>
@endif

<div class="modal fade" id="Modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>

@include('sweetalert::cdn')
@include('sweetalert::view')

<script src="{{ asset('storage/js/api.min.js') }}"></script>
<script src="{{ asset('js/jquery.webticker.min.js') }}"></script>
<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/4.9.0/basic/ckeditor.js"></script>
</body>
<script type="text/javascript">

    // Running the code when the document is ready
    $(document).ready(function(){

        $("#Modal").on("show.bs.modal", function(e) {
            var link = $(e.relatedTarget);
            $(this).find(".modal-body").load(link.attr("data-url"));
        });

        // Calling WebTicker on the target element
        $('#webticker').webTicker();

        // Back to top scroll script
        $('#scroll').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 900);
            return false;
        });

        setHeight('.content-wrapper')

        /*if this is not placed before it is to be called,
          the browser won't recognize it,
          which is why i preferably register these
          event functions in ready()*/
        window.onresize=function(){setHeight('.content-wrapper');};

    });

    function setHeight(column) {
        $(column).height( ($(document).height()) - 400 );
        console.log(column + ' ' + (($(document).height()) - 400) + 'px');
    }

</script>
</html>