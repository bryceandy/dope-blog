@extends('templates.main')

@section('title')
    Login Page
@endsection

@section('guest')
    Guest user <a href="/register">REGISTER</a>
@endsection

@section('content')
    <h1>Login</h1>

    <div id="loginForm">
        @if( session()->has('error_message') )
            <div class="alert-danger text-center">
                {{ session('error_message') }}
            </div>
        @endif
        @if( $errors->any)
            <div class="alert-danger">
                <ul>
                    @foreach( $errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="login" method="post">
            @csrf
            <div class="input-block">
                <label for="email">E-Mail</label>
                <input type="email" id="email" name="email">
            </div>

            <div class="input-block">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>

            <button type="submit">LOGIN</button>
        </form>
    </div>
@endsection