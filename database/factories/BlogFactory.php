<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'code' => $faker->userName,
        'name' => $faker->company,
        'description' => $faker->sentence
    ];
});
