<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JustTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExampleTest()
    {
        \Auth::loginUsingId(1);
        $result = $this->get('/posts');
        $this->assertTrue($result->status() == 200);
        $result->assertSee('posts');
    }
}
