@extends('templates.main')

@section('title')
    Create Post
@endsection

@section('content')
    <h1 class="text-center">Create Post</h1>

    @if( $errors->any)
        <div class="alert-danger">
            <ul>
                @foreach( $errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/create/post" method="post" id="createPostForm">
        @if( session()->has('post_success'))
            <div class="alert-info text-center">
                {{ session('post_success') }}
            </div>
        @endif

        @csrf
        <div class="input-block">
            <label for="title">Title</label>
            <input type="text" id="title" name="title">
        </div>

        <label for="body">Body</label>
        <textarea name="body" id="body"></textarea>

        <button type="submit">SUBMIT</button>
    </form>
@endsection