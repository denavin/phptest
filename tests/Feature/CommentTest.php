<?php

namespace Tests\Feature;

use App\Comment;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CommentTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function test_getBodyAttribute_method()
    {
        $comment = factory(Comment::class)->create(['body' => 'a body']);
        $this->assertEquals($comment->body, 'A body');
    }

    /** @test */
    public function test_getNewsIdAttribute_method()
    {
        $comment = factory(Comment::class)->create(['news_id' => 3]);
        $this->assertEquals($comment->news_id, 3);
    }

    /** @test */
    public function test_setBodyAttribute_method()
    {
        $comment = factory(Comment::class)->create(['body' => 'a body']);
        $comment->body = 'another body';
        $this->assertEquals($comment->body, 'Another body');
    }

    /** @test */
    public function test_setNewsIdAttribute_method()
    {
        $comment = factory(Comment::class)->create(['news_id' => 3]);
        $comment->news_id = 2;
        $this->assertEquals($comment->news_id, 2);
    }

    /** @test */
    public function test_list_method()
    {
        $allComments = Comment::list();
        $this->assertEquals($allComments->first()->body, ucfirst(DB::table('comments')->first()->body));
        $this->assertEquals($allComments->last()->body, ucfirst(DB::table('comments')->get()->last()->body));
    }

    /** @test */
    public function test_add_method()
    {
        $comment = Comment::add('the body', 1);
        $this->assertEquals(Comment::find($comment->id)->body, 'The body');
        $this->assertEquals(Comment::find($comment->id)->news_id, 1);
    }

    /** @test */
    public function test_deleteComment_method()
    {
        $comment = factory(Comment::class)->create();

        $this->assertTrue(Comment::deleteComment($comment->id));
        $this->assertNull(Comment::find($comment->id));
    }

}
