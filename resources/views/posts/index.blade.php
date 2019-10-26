@extends('templates.main')

@section('title')
    All Posts
@endsection

@section('content')
    <h1 class="text-center">Blog Posts</h1>

    @if(isset($posts))
        @foreach( $posts as $post)
            <div class="post">
                <h2 class="name"><a href="post/{{ $post->name }}">{{ $post->name }}</a></h2>
                <p class="body">{{ $post->body }}</p>
            </div>
        @endforeach

        {{ $posts->links() }}
    @endif
@endsection