@extends('templates.main')

@section('title')
    {{ $post->title }}
@endsection

@section('guest')
    Guest user<a href="/register">REGISTER</a> <a href="/login">LOGIN</a>
@endsection

@section('content')

    <h1>{{ $post->title }}</h1>

    <div>
        {!! $post->body !!}

        <div style="border: 1px solid;max-width:50vw">
            @if( count($post->comments))
                <h3>All comments</h3>
                @foreach($post->comments as $comment)
                    <div style="border:1px solid;margin:2%;padding:2vw;border-radius:4px">
                        <i style="float:right;font-size:small">by {{ $comment->user->first_name }} {{ \Illuminate\Support\Carbon::parse($post->created_at)->diffForHumans() }}</i>
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
            <label for="body">Comment</label>
            <textarea name="body" id="body" ></textarea>
            <button type="submit">SUBMIT</button>
        </form>
    </div>

@endsection