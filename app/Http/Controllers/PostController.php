<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Post;

class PostController extends Controller
{
    /** Display all posts */
    public function index()
    {
        $posts = Post::paginate(5);

        return view('posts.index', compact('posts'));
    }

    /** Show a specific post
     *
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $post)
    {
        return view('posts.post', compact('post'));
    }

    public function edit()
    {
        return view('posts.create');
    }

    public function save(CreatePostRequest $request)
    {
        $request['user_id'] = auth()->id();
        Post::create($request->all());
        return back()->with(['post_success' => 'Your article is posted']);
    }
}
