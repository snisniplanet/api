<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        "title" => $faker->word,
        "snippet" => $faker->sentence,
        "content" => "{}",
        "blog_id" => App\Blog::all()->random()
    ];
});
