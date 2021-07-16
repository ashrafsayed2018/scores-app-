<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{

    protected $guarded = [];


    // relationship with scores

    public function users() {

        return $this->hasMany(User::class);
    }



}
