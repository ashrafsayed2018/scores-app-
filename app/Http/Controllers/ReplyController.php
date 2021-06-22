<?php

namespace App\Http\Controllers;

use App\Post;
use App\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    // public function store(Request $request)
    // {
    //     $reply = new Reply();

    //     $attributes = $request->validate([

    //         'body' => 'required|max:255'
    //     ]);

    //     $reply->body = $request->get('body');

    //     $reply->user()->associate($request->user());

    //     $reply->parent_id = $request->get('comment_id');

    //     $post = Post::find($request->get('post_id'));

    //     $post->comments()->save($reply);

    //     return back();

    // }
}
