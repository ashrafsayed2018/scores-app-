<?php

namespace App;

use App\Reply;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use Likeable;
    protected $guarded = [];

    // relationship with user

    public function user () {

        return $this->belongsTo(User::class);
    }

    // relationship with category

    public function category () {

        return $this->belongsTo(Category::class);
    }

    // relationship with subcategory

    public function subcategory () {

        return $this->belongsTo(SubCategory::class);
    }

    // relationship with child category

    public function childcategory () {

        return $this->belongsTo(ChildCategory::class);
    }

    // relationship with likes

    public function likes()
    {
         return $this->morphMany('App\Like', 'likeable');


    }

    // relationship with comment

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->where('parent_id', 0);
    }

      // relationship with replies

      public function replies()
      {
          return $this->morphMany(Reply::class, 'commentable');
      }

}
