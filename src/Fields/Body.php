<?php


namespace vaweto\Press\Fields;


use Carbon\Carbon;
use vaweto\Press\MarkdownParser;

class Body extends FieldsContract
{
    public static function process($type, $value, $data)
    {
        return [
            $type => MarkdownParser::parse($value),
            'parsed_at' => Carbon::now()
        ];
    }
}