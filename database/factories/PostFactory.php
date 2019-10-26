<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {

    return [
        'title' => $faker->text(20),
        'body' => $faker->paragraphs,
        'user_id' => $faker->numberBetween(1, \App\User::all()->count())
    ];
});
