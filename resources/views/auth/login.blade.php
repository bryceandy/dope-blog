@extends('templates.main')

@section('title')
    Login Page
@endsection

@section('guest')
    Guest user <a href="register">REGISTER</a>
@endsection

@section('content')
    <h1>Login form</h1>

    <div id="loginForm">
        @if( $errors->any)
            @foreach( $errors->all() as $error)
                <div class="alert-danger">
                    <ul>
                        <li>{{ $error }}</li>
                    </ul>
                </div>
            @endforeach
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