@extends('templates.main')

@section('title')
    {{ $post->title }}
@endsection

@section('guest')
    Guest user<a href="register">REGISTER</a> <a href="login">LOGIN</a>
@endsection

@section('content')

    <h1>{{ $post->title }}</h1>

    <p>{{ $post->body }}</p>
@endsection