@extends('templates.main')

@section('title')
    Home Page
@endsection

@section('guest')
    <a href="/register">REGISTER</a> <a href="/login">LOGIN</a>
@endsection

@section('content')
    <h1>Welcome</h1>
    <h3><a href="posts" style="text-decoration: none">See posts 👉</a></h3>
    <h3><a href="/create/post" style="text-decoration: none">New Post</a></h3>
@endsection