<?php


namespace vaweto\Press\Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase;
use vaweto\Press\MarkdownParser;
use vaweto\Press\Post;

class SavePostsTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function a_post_can_be_created_with_factory()
    {
        $post = factory(Post::class)->create();
        dd($post);
       // $this->assertCount(1 ,Post::all());
    }
}