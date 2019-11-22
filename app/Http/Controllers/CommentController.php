<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;

class CommentController extends Controller
{
    public function save(Post $post)
    {

        $this->validate(request(), [
            'body' => 'required|min:5'
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            'body' => request()->body
        ]);

        return back()->with(['comment_success' => 'Your comment was saved']);
    }
}
