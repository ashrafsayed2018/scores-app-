<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\SubCategory;
use App\ChildCategory;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::all()->sortByDesc('created_at');
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Post $post)
    {

        $this->authorize('create', $post);


        $categories = Category::all();
        $subcategories = SubCategory::all();
        $childcategories = ChildCategory::all();

        if (auth()->user()->profile) {

            return view('post.create', compact(['categories', 'subcategories', 'childcategories']));
        } else {
            return redirect('profile/create');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        $title = $post->title;

        $post = Post::where('title', $title)->withPostLikes()->with('firstPostImage')->first();

        // increament the view count
        DB::table('posts')
            ->where('id', $post->id)
            ->increment('view_count', 1);


        //  note from the helpers.php recommenedPosts method we get all recommended posts
        return view('post.show', compact(['post']));
    }
}
