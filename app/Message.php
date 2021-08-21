<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    protected $appends = ['selfOwned'];

    public function getSelfOwnedAttribute()
    {

        return $this->from_id == auth()->id();
    }

    // relationship with user

    public function user()
    {

        return $this->belongsTo(User::class, 'from_id');
    }

    // sender method relationship

    public function sender()
    {

        return $this->belongsTo(User::class, 'from_id');
    }

    // receiver relationship

    public function receiver()
    {

        return $this->belongsTo(User::class, 'to_id');
    }

    // relationship with post

    public function post()
    {

        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
