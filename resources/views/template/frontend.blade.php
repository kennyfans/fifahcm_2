<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dự đoán - CLB Fifa Online 3 HCM</title>

    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div class="container header-area">
    <header id="masthead" class="site-header col-sm-12" role="banner">

        <div class="site-branding col-md-12">
            <a href="{{ url('/') }}" rel="home" class="pull-left">
                <img src="{{ url('images/logo.png') }}" alt="" class="site-logo" />
            </a>
            <div class="pull-left">
                <h1 class="site-title">CLB Fifa Online 3 HCM</h1>
                <h4 class="site-description">Niềm đam mê bất tận</h4>
            </div>
        </div>

    </header><!-- #masthead -->
</div>

<nav class="navbar navbar-default navbar-main">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Sự kiện</a></li>
                <li><a href="{{ url('/') }}">Thể lệ</a></li>
                <li><a href="http://news.hcmfo3club.net" target="_blank">Tin tức</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ route('facebookLogin') }}">
                            <img src="{{ url('images/facebook.png')  }}" alt="" class="logo-login-facebook"/>
                            <span>Đăng nhập thông qua Facebook</span>
                        </a>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle pull-left" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img src="{{ Auth::user()->avatar }}" alt="" class="img-circle img-responsive pull-left user-avatar"/>
                            <div class="pull-left">
                                {{ Auth::user()->name }}
                                <span class="caret"></span>
                            </div>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="container">

    @include('flash::message')
    @yield('content')

</div>


<!-- Scripts -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script>
    $('#flash-overlay-modal').modal();
</script>

</body>
</html>
