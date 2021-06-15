<?php

namespace App;

use App\Category;
use App\ChildCategory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{

    protected $guarded = [];


    // relatinship with category table

    public function category() {

        return $this->belongsTo(Category::class);
    }

    // relationship with child category table

    public function childcategories () {

        return $this->hasMany(ChildCategory::class);
    }
}
