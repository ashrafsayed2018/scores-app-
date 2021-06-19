<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function subcategories() {

        return $this->hasMany(SubCategory::class);

    }

    // relationship with posts

    public function posts() {
        return $this->hasMany(Post::class);
    }
}
