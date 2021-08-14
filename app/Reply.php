<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

class Reply extends Model
{

    use Likeable;
    use CascadesDeletes;

    protected $cascadeDeletes = ['likes'];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }


    public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
