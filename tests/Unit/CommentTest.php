<?php

namespace Tests\Unit;

use App\Comment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CommentTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function comment_should_have_body()
    {
        $this->expectException('Illuminate\Database\QueryException');
        factory(Comment::class)->create([
            'body' => null,
        ]);
    }

    /** @test */
    public function comment_should_have_news_id()
    {
        $this->expectException('Illuminate\Database\QueryException');
        factory(Comment::class)->create([
            'news_id' => null,
        ]);
    }
}
