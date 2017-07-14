<?php

namespace Tests\Feature;

use App\News;
use App\Comment;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NewsTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function test_list_method()
    {
        $allNews = News::list();
        $this->assertEquals($allNews->first()->title, DB::table('news')->first()->title);
        $this->assertEquals($allNews->last()->title, DB::table('news')->get()->last()->title);
    }

    /** @test */
    public function test_add_method()
    {
        $news = News::add('a title', 'a body');
        $this->assertEquals(News::find($news->id)->title, 'a title');
        $this->assertEquals(News::find($news->id)->body, 'a body');
    }

    /** @test */
    public function test_deleteNewsWithComments_method()
    {
        $news = factory(News::class)->create();
        $comment = factory(Comment::class)->create(['news_id' => $news->id]);
        $comment2 = factory(Comment::class)->create(['news_id' => $news->id]);

        $this->assertTrue(News::deleteNewsWithComments($news->id));
        $this->assertNull(News::find($news->id));
        $this->assertNull(Comment::find($comment->id));
        $this->assertNull(Comment::find($comment2->id));
    }

}
