<?php

namespace App\Http\Controllers;

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
}
