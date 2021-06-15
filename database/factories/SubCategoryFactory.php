<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SubCategory;
use Faker\Generator as Faker;

$factory->define(SubCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'image' => $faker->unique()->image,
        'category_id' => 1
    ];
});
