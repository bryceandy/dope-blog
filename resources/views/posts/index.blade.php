@extends('templates.main')

@section('title')
    All Posts
@endsection

@section('guest')
    <a href="/register">REGISTER</a> <a href="/login">LOGIN</a>
@endsection

@section('content')
    <h1 class="text-center mb-4">Blog Posts</h1>

    @if( count($posts))
        @foreach( $posts as $post)
            <div class="row mb-4">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><a href="posts/{{ $post->slug }}">{{ $post->title }}</a></h5>
                            @if( preg_match('/<img(.*)>/', $post->body, $images) )
                                <a href="posts/{{ $post->slug }}" class="cover-image">{!! $images[0] !!}</a>
                            @else
                                <p class="card-text" style="overflow:hidden;white-space: nowrap;text-overflow:ellipsis">{!! $post->body  !!}</p>
                            @endif
                            <a href="posts/{{ $post->slug }}" class="btn button-primary">Read More</a>
                        </div>
                    </div>
                    <i style="font-size:small;color:grey">by <span style="color:black">{{ $post->user->first_name }}</span> {{ $post->created_at->diffForHumans() }}</i>
                </div>
            </div>
        @endforeach

        {{ $posts->links() }}
    @else
        <h4>There are no posts yet</h4>
    @endif
@endsection