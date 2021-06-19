<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function store(Post $post) {

        $user = auth()->user();


        $post->like($user);

         return back();
    }

    public function destroy(Post $post)
    {
        $user = auth()->user();

        $post->dislike($user);
        return back();
    }
}
