<?php

namespace App;

use App\Profile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,Followable;

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

    // image path

    public function imagePath() {

       return $this->profile ? '/storage/users_images/'.  $this->profile->image : 'storage/images/avatar.jpg';
    }

}
