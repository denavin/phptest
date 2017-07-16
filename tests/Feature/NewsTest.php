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
    public function test_getTitleAttribute_method()
    {
        $news = factory(News::class)->create(['title' => 'a title']);
        $this->assertEquals($news->title, 'A title');
    }

    /** @test */
    public function test_getBodyAttribute_method()
    {
        $news = factory(News::class)->create(['body' => 'a body']);
        $this->assertEquals($news->body, 'A body');
    }

    /** @test */
    public function test_setTitleAttribute_method()
    {
        $news = factory(News::class)->create(['title' => 'a title']);
        $news->title = 'another title';
        $this->assertEquals($news->title, 'Another title');
    }

    /** @test */
    public function test_setBodyAttribute_method()
    {
        $news = factory(News::class)->create(['body' => 'a body']);
        $news->body = 'another body';
        $this->assertEquals($news->body, 'Another body');
    }

    /** @test */
    public function test_list_method()
    {
        $allNews = News::list();
        $this->assertEquals($allNews->first()->title, ucfirst(DB::table('news')->first()->title));
        $this->assertEquals($allNews->last()->title, ucfirst(DB::table('news')->get()->last()->title));
    }

    /** @test */
    public function test_add_method()
    {
        $news = News::add('a title', 'a body');
        $this->assertEquals(News::find($news->id)->title, 'A title');
        $this->assertEquals(News::find($news->id)->body, 'A body');
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
