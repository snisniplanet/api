<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        "title" => $faker->sentence,
        "snippet" => $faker->paragraph,
        "content" => '{"type":"doc","content":[{"type":"paragraph","content":[{"type":"text","text":"I would really like to make a blog"}]}]}',
        "blog_id" => App\Blog::all()->random()
    ];
});
