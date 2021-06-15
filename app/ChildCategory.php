<?php

namespace App;

use App\SubCategory;
use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{

    protected $guarded = [];

    public function subcategory() {

        return $this->belongsTo(SubCategory::class);
    }
}
