<?php

namespace App;

use App\Like;
use App\Post;
use Illuminate\Database\Eloquent\Model;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

class Comment extends Model
{

    use Likeable;
    protected $guarded = [];

    use CascadesDeletes;

    protected $cascadeDeletes = ['replies', 'likes'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class, 'parent_id');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
