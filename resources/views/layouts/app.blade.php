<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="This is social network html5 template available in themeforest......" />
        <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
        <meta name="robots" content="index, follow" />
        <title>Social Network - @yield('title')</title>

        <!-- Stylesheets
        ================================================= -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }} " />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }} " />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.8/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />


        <!--Google Font-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">

        <!--Favicon-->
        <link rel="shortcut icon" type="image/png" href="{{ asset('images/fav.png') }}"/>
    </head>
    <body>
        <header id="header">
            <nav class="navbar navbar-default navbar-fixed-top menu">
                <div class="container">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/"><img src="{{ asset('images/logo.png') }}" alt="logo" /></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right main-menu">
                            <li class="dropdown">
                                <a href="/" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                            </li>
                            <li class="dropdown">
                                <a href="/persona" role="button" aria-haspopup="true" aria-expanded="false">People Nearly</a>
                            </li>
                            @if (Auth::check())
                                <li class="dropdown">
                                    <form method="post" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="btn btn-danger" name="logout">Log out</button>
                                    </form>
                                </li>
                            @endif
                        </ul>
                        <form class="navbar-form navbar-right hidden-sm">
                            <div class="form-group">
                                <i class="icon ion-android-search"></i>
                                <input type="text" class="form-control" placeholder="Search friends, photos, videos">
                            </div>
                        </form>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav>
        </header>
        @yield('content')
        <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery.appear.min.js') }}"></script>
        <script src="{{ asset('js/jquery.incremental-counter.js') }}"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTMXfmDn0VlqWIyoOxK8997L-amWbUPiQ&callback=initMap"></script>
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>