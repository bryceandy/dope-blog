@extends('templates.main')

@section('title')
    {{ $post->title }}
@endsection

@section('guest')
    <a href="/register">REGISTER</a> <a href="/login">LOGIN</a>
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
                    <div class="mb-4" style="border:1px solid lightgrey;padding:1vw;border-radius:4px">
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

        @guest
            <p>Please <a href="/login">login</a> to participate!</p>
        @endguest
        <form action="/comment/{{ $post->slug }}" method="post" class="posts" style="border:unset;max-width:80%;margin-left:0;padding:0">
            @csrf
            <label for="body"></label>
            <textarea name="body" id="body" placeholder="Say something..."></textarea>
            <button type="submit" @guest disabled @endguest>SUBMIT</button>
        </form>
    </div>

@endsection