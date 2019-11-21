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
                <h2 class="name"><a href="post/{{ $post->name }}">{{ $post->name }}</a></h2>
                <p class="body">{{ $post->body }}</p>
            </div>
        @endforeach

        {{ $posts->links() }}
    @else
        <h4>There are no posts yet</h4>
    @endif
@endsection