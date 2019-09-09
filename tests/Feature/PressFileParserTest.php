<?php
/**
 * Created by PhpStorm.
 * User: vagelis
 * Date: 8/9/2019
 * Time: 6:03 μμ
 */

namespace vaweto\Press\Tests;


use Carbon\Carbon;
use Orchestra\Testbench\TestCase;
use vaweto\Press\PressFileParser;


class PressFileParserTest extends TestCase
{
    /** @test */
    public function the_head_and_body_gets_split()
    {
        $pressFileParser = (new PressFileParser(__DIR__.'/../blogs/MarkFile1.md'));

        $data = $pressFileParser->getData();

        $this->assertStringContainsString('title: My Title', $data[1]);
        $this->assertStringContainsString('description: Discription here', $data[1]);
        $this->assertStringContainsString('Blog post body here', $data[2]);
    }

    /** @test */
    public function a_string_can_be_used_instead_of_file()
    {
        $pressFileParser = (new PressFileParser('---\ntitle: hello there\n---\nBlog post body here'));

        $data = $pressFileParser->getData();

        $this->assertStringContainsString('title: hello there', $data[1]);
        $this->assertStringContainsString('Blog post body here', $data[2]);
    }

    /** @test */
    public function each_head_field_gets_seperated()
    {
        $pressFileParser = (new PressFileParser(__DIR__.'/../blogs/MarkFile1.md'));

        $data = $pressFileParser->getData();

        $this->assertEquals('My Title', $data['title']);
        $this->assertEquals('Discription here', $data['description']);
    }

    /** @test */
    public function the_body_gets_saved_and_trimmed()
    {
        $pressFileParser = (new PressFileParser(__DIR__.'/../blogs/MarkFile1.md'));

        $data = $pressFileParser->getData();

        $this->assertEquals("<h1>heading</h1>\n<p>Blog post body here</p>", $data['body']);
    }

    /** @test */
    public function a_date_field_gets_parsed()
    {
        $pressFileParser = (new PressFileParser('--- date: May 14, 1988 ---'));

        $data = $pressFileParser->getData();

        $this->assertInstanceOf(Carbon::class, $data['date']);
        $this->assertEquals('05/14/1988',$data['date']->format('m/d/Y'));
    }
}