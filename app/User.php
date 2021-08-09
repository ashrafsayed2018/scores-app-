<?php

namespace App;

use App\Score;
use App\Comment;
use App\Profile;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use ChristianKuri\LaravelFavorite\Traits\Favoriteability;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, Followable, Favoriteability, HasRoles, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;

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

        static::created(function ($user) {
            //$user->name is available
            //$user->email is available
            //Do now what you want with them

            // insert the scores details
            Score::create([
                'user_id' => $user->id,
                "score_type" => "registration",
                "scores"     => 5,
            ]);
        });
    }

    public function profile()
    {

        return $this->hasOne(Profile::class, "user_id", "id");
    }

    // relationship with posts

    public function posts()
    {

        return $this->hasMany(Post::class);
    }

    // relationship with likes

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // relationship with comments

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    // relationship with scores

    public function scores()
    {

        return $this->hasMany(Score::class);
    }

    // relation with finger

    public function finger()
    {
        return $this->hasOne(Finger::class);
    }

    // relationship with very user

    public function verifyUser()
    {

        return $this->hasOne(verifyUser::class);
    }

    // image path

    public function imagePath()
    {

        return $this->profile ? '/storage/users_images/' .  $this->profile->image : $this->avatar;
        //'storage/images/avatar.jpg'
    }

    // search for a user

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%');
    }
}
