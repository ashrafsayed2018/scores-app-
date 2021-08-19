<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    public function user()
    {

        return $this->belongsTo(User::class);
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
}
