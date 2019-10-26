@extends('templates.main')

@section('title')
    Home Page
@endsection

@section('guest')
    Guest user<a href="register">REGISTER</a> <a href="login">LOGIN</a>
@endsection

@section('content')
    <h1>Welcome</h1>
    <h4><i><a href="posts">See posts</a></i></h4>
@endsection