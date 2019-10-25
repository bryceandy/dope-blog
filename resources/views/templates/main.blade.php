<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ 'css/app.css' }}">
    <script src="{{ 'js/app.js' }}"></script>

    <title>@yield('title')</title>
</head>
<body>

    <div id="header" class="text-center">
        <a href="/" class="home">DOP.E - blog</a>
    </div>

    <div id="auth" class="text-right">
        @if( auth()->check() )
            <p class="user"><b>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</b></p>
            <div id="logout"><a href="logout">LOGOUT</a></div>
        @else
            <div class="guest">
                @yield('guest')
            </div>
        @endif
    </div>

    <div id="content">
        @yield('content')
    </div>

    <div id="footer">

    </div>

</body>
</html>