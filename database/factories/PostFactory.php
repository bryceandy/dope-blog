<?php

/** @var Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(\App\Post::class, function (Faker $faker) {

    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraphs,
        'user_id' => static function() {
            return factory(\App\User::class)->create()->id;
        }
    ];
});
