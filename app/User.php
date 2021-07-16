<?php

namespace App;

use App\Score;
use App\Profile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use ChristianKuri\LaravelFavorite\Traits\Favoriteability;

class User extends Authenticatable
{
    use Notifiable,Followable, Favoriteability;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function($user)
        {
            //$user->name is available
            //$user->email is available
            //Do now what you want with them
            Score::create([
                'user_id' => $user->id,
                 "score_type" => "registration",
                 "scores"     => 5,
              ]);
        });
    }

    public function profile() {

        return $this->hasOne(Profile::class,"user_id","id");
    }

    // relationship with posts

    public function posts () {

        return $this->hasMany(Post::class);
    }

    // relationship with likes

    public function likes() {
        return $this->hasMany(Like::class);
    }

    // relationship with scores

    public function scores() {

        return $this->hasMany(Score::class);
    }

    // image path

    public function imagePath() {

       return $this->profile ? '/storage/users_images/'.  $this->profile->image : 'storage/images/avatar.jpg';
    }



}
