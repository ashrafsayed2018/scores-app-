<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // public function store(Request $request)
    // {

    //     $comment = new Comment;
    //     $attributes = $request->validate([

    //         'body' => 'required|max:255'
    //     ]);

    //     $comment->body = $request->body;
    //     $comment->parent_id = 0;

    //     $comment->user()->associate($request->user());

    //     $post = Post::find($request->post_id);

    //     $post->comments()->save($comment);

    //     return back();
    // }


}
