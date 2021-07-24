<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finger extends Model
{
    protected $fillable = ['ipaddress', 'country', 'finger', 'browser', 'flash', 'canvas', 'connection', 'cookies', 'display', 'fonts', 'formfields', 'java', 'language', 'os', 'touch', 'plugins', 'useragent'];

    protected $dates = ['created_at', 'updated_at'];
}
