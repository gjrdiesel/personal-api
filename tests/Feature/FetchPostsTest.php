<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class FetchPostsTest extends TestCase
{
    use DatabaseMigrations;

    public function testExample()
    {
        $this->artisan('posts:pull');

        $this->assertTrue(Post::count() > 0);
    }
}
