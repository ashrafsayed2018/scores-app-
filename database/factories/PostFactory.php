<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [

        'user_id' => factory(User::class),
        'title'   => $faker->sentence(),
        'description' => $faker->paragraph(),
        'image'      => $faker->image('public/storage/images',640,480, null, false),
    ];
});
