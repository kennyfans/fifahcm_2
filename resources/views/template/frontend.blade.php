<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang sự kiện dự đoán - CLB Fifa Online 3 HCM</title>

    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    <link rel="icon" type="image/png" href="{{ url('images/favicon.png') }}" />

    <meta name="description" content="CLB Fifa Online 3 Hồ Chí Minh - Niềm Đam Mê Bất Tận"/>
    <meta name="keywords" content="sự kiện dự đoán clb fifa online 3 hcm,câu lạc bộ fifa online 3 hồ chí minh, clb fifa online 3 hồ chí minh,clb fifa online 3 hcm, esport, fifaonline, fifaonline3"/>
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="CLB Fifa Online 3 Hồ Chí Minh" />
    <meta property="og:description" content="CLB Fifa Online 3 Hồ Chí Minh - Niềm Đam Mê Bất Tận" />
    <meta property="og:url" content="http://dudoan.hcmfo3club.net" />
    <meta property="og:site_name" content="CLB Fifa Online 3 Hồ Chí Minh" />
    <meta property="article:publisher" content="https://www.facebook.com/FFOLTPHCM?fref=ts" />
    <meta property="fb:app_id" content="1642736695942578" />
    <meta property="og:image" content="{{ url('images/logo.png') }}" />

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
                <img src="{{ url('images/logo.png') }}" alt="CLB Fifa Online 3 Hồ Chí Minh - Niềm Đam Mê Bất Tận" class="site-logo" />
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
                <li><a href="{{ route('rulePage') }}">Thể lệ</a></li>
                <li><a href="http://news.hcmfo3club.net" target="_blank">Tin tức</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ route('facebookLogin') }}">
                            <img src="{{ url('images/facebook.png')  }}" alt="Facebook Login" class="logo-login-facebook"/>
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
                            <li><a href="{{ route('userInfo') }}">Cập nhật thông tin</a></li>
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


<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-64232208-1', 'auto');
    ga('send', 'pageview');

</script>

</body>
</html>
