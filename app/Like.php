<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = [];

    // public function post () {

    //     return $this->belongsTo(Post::class);
    // }

    public function likeable()
    {
        return $this->morphTo();
    }
}
