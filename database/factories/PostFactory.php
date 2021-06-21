<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [

        'user_id' =>  function () {
            return factory(App\User::class,5)->create();
        },
        'title'   => $faker->sentence(),
        'description' => $faker->paragraph(),
        'phone'       => '99889900',
        'category_id' =>  function () {
            return factory(App\Category::class,5)->create();
        },
        'sub_category_id' =>  function () {
            return factory(App\SubCategory::class,5)->create();
        },
        'child_category_id'=>  function () {
            return factory(App\ChildCategory::class,5)->create();
        },
        'images'      => $faker->image('public/storage/images',640,480, null, false),
    ];
});
