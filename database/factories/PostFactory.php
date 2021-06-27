<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {

    $title = $faker->sentence();
    return [

        'user_id' =>  rand(1,10),
        'title'   => $title,
        'slug'    => Str::slug($title),
        'description' => $faker->paragraph(),
        'phone'       => '99889900',
        'category_id' =>  3,
        'sub_category_id' => rand(3,10),
        'child_category_id'=> null,
        'images'      => $faker->image('public/storage/post_images',640,480, null, false),
    ];
});
