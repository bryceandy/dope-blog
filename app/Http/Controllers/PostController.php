<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::paginate(5);

        return view('index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('home', compact('post'));
    }
}
