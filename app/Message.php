<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    // sender method

    public function sender()
    {

        return $this->belongsTo(User::class, 'from_id');
    }

    // receiver method

    public function receiver()
    {

        return $this->belongsTo(User::class, 'to_id');
    }
}
