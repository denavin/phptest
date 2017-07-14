<?php

namespace Tests\Unit;

use App\News;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NewsTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function news_should_have_title()
    {
        $this->expectException('Illuminate\Database\QueryException');
        factory(News::class)->create([
            'title' => null,
        ]);
    }

    /** @test */
    public function news_should_have_body()
    {
        $this->expectException('Illuminate\Database\QueryException');
        factory(News::class)->create([
            'body' => null,
        ]);
    }
}
