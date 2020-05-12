<?php

use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Blog::class, 10)->create()->each(function($blog){
            $blog->subscribers()->saveMany(App\User::all()->random(20));
            $blog->managers()->attach(App\User::all()->random()->id);
        });
    }
}
