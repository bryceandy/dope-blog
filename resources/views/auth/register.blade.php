@extends('templates.main')

@section('title')
    Register Page
@endsection

@section('guest')
    Guest user <a href="login">LOGIN</a>
@endsection

@section('content')
    <h1>Register</h1>

    <div id="registrationForm">

        @if( session()->has('message') )
            <div class="alert-info text-center">
                {{ session('message') }}
            </div>
        @endif
        @if( $errors->any)
            @foreach( $errors->all() as $error)
                <div class="alert-danger">
                    <ul>
                        <li>{{ $error }}</li>
                    </ul>
                </div>
            @endforeach
        @endif
        <form action="/register" method="post">
            @csrf
            <div class="input-block">
                <label for="first_name">First name</label>
                <input type="text" id="first_name" name="first_name">
            </div>

            <div class="input-block">
                <label for="last_name">Last name</label>
                <input type="text" id="last_name" name="last_name">
            </div>

            <div class="input-block">
                <label for="email">E-Mail</label>
                <input type="email" id="email" name="email">
            </div>

            <div class="input-block">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>

            <button type="submit">REGISTER</button>
        </form>
    </div>
@endsection