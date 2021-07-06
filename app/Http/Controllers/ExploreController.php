<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Profiles = Profile::where('user_id', '!=', auth()->id())->paginate(3);

        return view('explore.index',[
            'profiles' => $Profiles
        ]);
    }

}
