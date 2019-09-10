<?php


namespace vaweto\Press;


use vaweto\Press\Tests\TestCase;

class MarkdownParser extends TestCase
{
    public static function parse($string)
    {
        return \Parsedown::instance()->text($string);

    }
}