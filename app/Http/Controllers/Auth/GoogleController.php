<?php

namespace App\Http\Controllers\Auth;


use App\User;
use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth as auth;
use Laravel\Socialite\Facades\Socialite as socialite;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = socialite::driver('google')->stateless()->user();

            $finduser = User::where('email', $user->email)->orwhere('google_id', $user->id)->first();


            if ($finduser) {

                auth::login($finduser);

                return redirect('/home');
            } else {

                $newUser = User::create([
                    'name' => $user->name,
                    'slug'  => make_slug($user->name),
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'email_verified_at' => Carbon::now(),
                    'password' => encrypt('123456dummy'),
                    'avatar'   => $user->avatar
                ]);
                Auth::login($newUser);

                return redirect('/login');
            }
        } catch (Exception $e) {
            dd('error');
        }
    }
}
