@extends('templates.main')

@section('title')
    {{ $post->title }}
@endsection

@section('guest')
    Guest user<a href="/register">REGISTER</a> <a href="/login">LOGIN</a>
@endsection

@section('content')

    <h1 class="mb-4">{{ $post->title }}</h1>

    <i style="font-size:small;color:grey" class="mb-3"><span style="color:black">{{ $post->user->first_name }}</span> {{ $post->created_at->diffForHumans() }}</i>
    <div class="w-50">
        <div class="mb-5" style="line-height: 1.75">
            {!! $post->body !!}
        </div>

        <div>
            @if( count($post->comments))
                <h3>All comments</h3>
                @foreach($post->comments as $comment)
                    <div style="border:1px solid;margin:2%;padding:2vw;border-radius:4px">
                        <i style="float:right;font-size:small">{{ $comment->user->first_name }} - {{ $comment->created_at->diffForHumans() }}</i>
                        <p style="margin-top:20px">{{ $comment->body }}</p>
                    </div>
                @endforeach
            @endif
        </div>

        @if( session()->has('comment_success') )
            <div class="alert-info text-center">
                {{ session('comment_success') }}
            </div>
        @endif

        <form action="/comment/{{ $post->slug }}" method="post" class="posts" style="border:unset;max-width:50vw;margin-left:0">
            @csrf
            <label for="body">Add comment</label>
            <textarea name="body" id="body" @guest placeholder="Login to comment..." @endguest></textarea>
            <button type="submit" @guest disabled @endguest>SUBMIT</button>
        </form>
    </div>

@endsection