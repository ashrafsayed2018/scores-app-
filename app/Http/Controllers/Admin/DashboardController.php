<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        $posts = Post::all();
        $comments = Comment::all();
        $lastWeekUsers = User::whereDate('created_at', '>', \Carbon\Carbon::now()->subWeek())->get();
        $lastWeekPosts = Post::whereDate('created_at', '>', \Carbon\Carbon::now()->subWeek())->get();
        $totalViews = $posts->sum('view_count');
        $totalComments = $comments->sum('id');

        return view('admin.dashboard.index', compact(['users', 'lastWeekUsers', 'posts', 'lastWeekPosts', 'totalViews', 'totalComments']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * show all users
     */

    public function users()
    {

        return view('admin.users.index');
    }

    /**
     * show all posts
     */

    public function posts()
    {

        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }
}
