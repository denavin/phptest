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
    public function test_list_method()
    {
        $allComments = Comment::list();
        $this->assertEquals($allComments->first()->body, DB::table('comments')->first()->body);
        $this->assertEquals($allComments->last()->body, DB::table('comments')->get()->last()->body);
    }

    /** @test */
    public function test_add_method()
    {
        $comment = Comment::add('the body', 1);
        $this->assertEquals(Comment::find($comment->id)->body, 'the body');
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
