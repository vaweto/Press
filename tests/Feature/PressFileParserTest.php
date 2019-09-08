<?php
/**
 * Created by PhpStorm.
 * User: vagelis
 * Date: 8/9/2019
 * Time: 6:03 μμ
 */

namespace vaweto\Press\Tests;


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
}