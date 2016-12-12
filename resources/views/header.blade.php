<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Flommerce') }}</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
        <link href="/css/app.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/22eb44b58d.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-light navbar-default-bg navbar-static-top">
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
                    <ul class="nav navbar-nav navbar-left">
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('products.index') }}" class="nav-link">Products</a>
                        </li>
                    </ul>
                    <form class="form-inline pull-right">
                        <ul class="nav navbar-nav navbar-right">
                            @if (Auth::guest())
                                <li class="nav-item">
                                    <a href="{{ url('/login') }}" class="nav-link"><i class="fa fa-power-on"></i>Login</a></li>
                                <li class="nav-item"><a href="{{ url('/register') }}" class="nav-link">Register</a></li>
                            @else
                            <li class="nav-item">
                                <a href="{{ url('/cart') }}" class="nav-link">
                                    <i class="fa fa-shopping-cart"></i>
                                    Cart
                                    @if(Session::has('cart'))
                                        <span class="tag tag-pill tag-default">{{ Session::get('cart')->totalQuantity }}</span>
                                    @endif
                                </a>
                            </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle"
                                    href="{{ route('dashboard') }}"
                                    id="responsiveNavbarDropdown"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                        <i class="fa fa-user-circle"></i>
                                        {{ Auth::user()->first_name }}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="responsiveNavbarDropdown">
                                        <li>
                                            <a href="{{ url('/dashboard') }}" class="dropdown-item">
                                                <i class="fa fa-dashboard"></i>
                                                Dashboard
                                            </a>
                                        </li>
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
