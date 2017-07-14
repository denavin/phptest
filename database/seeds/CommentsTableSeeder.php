<?php

use App\Comment;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Comment::class, 10)->create(['news_id' => 1]);
        factory(App\Comment::class, 5)->create(['news_id' => 2]);
        factory(App\Comment::class, 2)->create(['news_id' => 3]);
    }
}
