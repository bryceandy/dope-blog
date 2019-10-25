@extends('templates.main')

@section('title')
Register Page
@endsection

@section('content')
    <h1>Register</h1>
    <div id="registrationForm">
        <form action="">
            <div class="input-block">
                <label for="first_name">First name</label>
                <input type="text" id="first_name">
            </div>

            <div class="input-block">
                <label for="last_name">Last name</label>
                <input type="text" id="last_name">
            </div>

            <div class="input-block">
                <label for="email">E-Mail</label>
                <input type="email" id="email">
            </div>

            <div class="input-block">
                <label for="password">Password</label>
                <input type="password" id="password">
            </div>

            <button type="submit">REGISTER</button>
        </form>
    </div>
@endsection