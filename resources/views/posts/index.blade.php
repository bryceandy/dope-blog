@extends('templates.main')

@section('title')
    All Posts
@endsection

@section('content')

    @foreach( $posts as $post)

        <div class="post">
            <h2 class="name"><a href="post/{{ $post->name }}">{{ $post->name }}</a></h2>
            <p class="body">{{ $post->body }}</p>
        </div>
    @endforeach

    {{ $posts->links() }}

@endsection