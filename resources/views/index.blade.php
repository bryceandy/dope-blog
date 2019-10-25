<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ 'css/app.css' }}">
    <title>Document</title>
</head>
<body>
    <h1 style="text-align: center">Our Posts</h1>

    @foreach( $posts as $post)

        <div class="post">
            <h2 class="name"><a href="post/{{ $post->name }}">{{ $post->name }}</a></h2>
            <p class="body">{{ $post->body }}</p>
        </div>

    @endforeach

    {{ $posts->links() }}
</body>
</html>