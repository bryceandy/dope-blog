@extends('templates.main')

@section('title')
    Create Post
@endsection

@section('header-scripts')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea', plugins:'image media link code imagetools'});</script>
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

    <form action="/create/post" method="post" class="posts" id="createPostForm">
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