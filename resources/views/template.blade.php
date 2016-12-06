<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Flommerce') }}</title>

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body style="padding-top: 95px;">
        <nav class="navbar navbar-light bg-faded navbar-fixed-top">
            <div class="container">

                <button class="navbar-toggler hidden-lg-up" type="button"
                data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"></button>

                <div class="collapse navbar-toggleable-md" id="navbarResponsive">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <i class="fa fa-home"></i>
                            {{ config('app.name', 'Flommerce') }}
                    </a>
                    <form class="form-inline pull-right">
                        <ul class="nav navbar-nav navbar-right">
                            @if (Auth::guest())
                                <li class="nav-item">
                                    <a href="{{ url('/login') }}" class="nav-link"><i class="fa fa-power-on"></i>Login</a></li>
                                <li class="nav-item"><a href="{{ url('/register') }}" class="nav-link">Register</a></li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle"
                                    href="http://example.com"
                                    id="responsiveNavbarDropdown"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                        <i class="fa fa-user-circle"></i>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="responsiveNavbarDropdown">
                                        <li>
                                            <a href="{{ url('/home') }}" class="dropdown-item">
                                                <i class="fa fa-dashboard"></i>
                                                Dashboard
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/cart') }}" class="dropdown-item">
                                                <i class="fa fa-shopping-cart"></i>
                                                Your Cart
                                            </a>
                                        <li>
                                        <li>
                                            <a href="{{ url('/categories/create') }}" class="dropdown-item">
                                                <i class="fa fa-plus-square"></i>
                                                Create Category
                                            </a>
                                        <li>
                                        <li>
                                            <a href="{{ url('/products/create') }}" class="dropdown-item">
                                                <i class="fa fa-pencil-square"></i>
                                                Create Product
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/logout') }}" class="dropdown-item" role="button">
                                                <i class="fa fa-power-off"></i>
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif</ul>
                    </form>
                </div>
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="/js/app.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        @yield('scripts')
    </body>
</html>
