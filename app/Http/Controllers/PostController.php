<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Display all posts
    public function index()
    {
        $posts = Post::latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    // Display a single post
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // Display form to create a new post
    public function edit()
    {
        return view('posts.create');
    }

    // Create a new post and save in the db
    public function store(CreatePostRequest $request)
    {
        $request['user_id'] = Auth::id();

        Post::create($request->all());

        return back()->with(['post_success' => 'Your article is posted']);
    }
}
