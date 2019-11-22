@extends('templates.main')

@section('title')
    Home Page
@endsection

@section('guest')
    Guest user<a href="register">REGISTER</a> <a href="login">LOGIN</a>
@endsection

@section('content')
    <h1>Welcome</h1>
    <h3><a href="posts" style="text-decoration: none">See posts 👉</a></h3>
@endsection