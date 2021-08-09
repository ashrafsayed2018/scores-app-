<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();


        // check if the user has a profile

        if ($user->profile) {
            $profile = $user->profile;
            return redirect("profile/{$user->slug}/edit");
        }


        return view('profile.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileRequest $request)
    {


        $validtated = $request->validated();

        $file = $request->image;

        if ($request->hasFile('image')) {

            $image = rand(1, 1000000000) . '.' .  $file->extension();

            $request->image->storeAs('users_images', $image, 'public');

            $validtated['image'] = $image;
        }

        $validtated['slug'] =  make_slug($validtated['name']);
        auth()->user()->profile()->create($validtated);
        auth()->user()->name = $validtated['name'];
        current_user()->slug =  $validtated['slug'];
        auth()->user()->save();
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {

        return view('profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {

        $user = auth()->user();
        // check if the user not has  a profile

        if (!$user->profile) {
            $profile = $user->profile;
            return redirect("profile/create");
        }

        return view('profile.edit', compact(['profile']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {


        $validtated = $request->validated();

        $file = $request->image;



        if ($request->hasFile('image')) {


            if (current_user()->profile->image) {

                Storage::delete('public/users_images/' . current_user()->profile->image);
            }

            $image = rand(1, 1000000000) . '.' . $file->extension();


            $request->image->storeAs('users_images', $image, 'public');

            $validtated['image'] = $image;
        }
        $validtated['slug'] =  make_slug($validtated['name']);
        current_user()->profile->update($validtated);

        current_user()->name = $validtated['name'];
        current_user()->slug =  $validtated['slug'];
        current_user()->save();

        return redirect("profile/show/" . current_user()->slug);
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
}
