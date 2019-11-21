<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ '/css/app.css' }}">
        <script src="{{ '/js/app.js' }}"></script>

        <title>@yield('title')</title>
    </head>
    <body id="main-body">

        <div id="header">
            <a href="/" class="home">DOP.E - blog</a>
            <div class="auth">
                @if( auth()->check() )
                    <div class="logout">
                        <b> @ {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</b><a href="/logout">LOGOUT</a>
                    </div>
                @else
                    <div class="guest">
                        @yield('guest')
                    </div>
                @endif
            </div>
        </div>

        <div id="content">
            @yield('content')
        </div>

        <div id="footer" class="text-center text-white">
            <small>&copy; DOP.E 2019</small>
        </div>
    </body>
</html>