<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $guarded = [];

    // relationship with user

    public function user () {

        return $this->belongsTo(User::class);
    }
}
