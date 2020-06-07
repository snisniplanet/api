<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        factory(App\Article::class, 10)->create()->each(function($article){
            $article->authors()->saveMany(App\User::all()->random(3));
        });
    }
}
