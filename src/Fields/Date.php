<?php


namespace vaweto\Press\Fields;


use Carbon\Carbon;

class Date extends FieldsContract
{
    public static function process($type, $value, $data)
    {
        return [
            $type => Carbon::parse($value),
            'parsed_at' => Carbon::now()
        ];
    }
}