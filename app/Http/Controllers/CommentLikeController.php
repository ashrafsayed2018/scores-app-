<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentLikeController extends Controller
{
    public function store(Comment $comment) {

        $user = auth()->user();


        $comment->like($user);

         return back();
    }

    public function destroy(Comment $comment)
    {
        $user = auth()->user();

        $comment->dislike($user);
        return back();
    }
}
