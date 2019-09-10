<?php

namespace vaweto\Press\Fields;


abstract class FieldsContract
{
    public static function process($fieldType, $fieldValue, $FieldData) {
        return [$fieldType => $fieldValue];
    }
}