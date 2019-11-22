@extends('templates.main')

@section('title')
    All Posts
@endsection

@section('guest')
    Guest user<a href="register">REGISTER</a> <a href="login">LOGIN</a>
@endsection

@section('content')
    <h1 class="text-center">Blog Posts</h1>

    @if( count($posts))
        @foreach( $posts as $post)
            <div class="post">
                <h2 class="name"><a href="post/{{ $post->slug }}">{{ $post->title }}</a></h2>
                <i>by {{ $post->user->first_name }} {{ \Illuminate\Support\Carbon::parse($post->created_at)->diffForHumans() }}</i>
                <div class="body">{!! $post->body  !!}</div>
            </div>
        @endforeach

        {{ $posts->links() }}
    @else
        <h4>There are no posts yet</h4>
    @endif
@endsection