<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {

    $gender = $faker->randomElement(['male', 'female']);
    return [
        'user_id' => factory(User::class),
        'username' => $faker->name($gender),
        'about'    => $faker->sentence(),
        'image'    => $faker->image('public/storage/user_images',640,480, null, false),
        'age'      => $faker->numberBetween(18,65),
        'gender'   => $gender

    ];
});
