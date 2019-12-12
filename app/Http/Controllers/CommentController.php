<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CreateCommentRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Save comment in the db
    public function save(CreateCommentRequest $request, Post $post)
    {
        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id,
            'body' => $request['body'],
        ]);
        return back()->with(['comment_success' => 'Your comment was saved']);
    }
}
