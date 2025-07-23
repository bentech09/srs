<?php
class utilValidator
{

    public static function isEmpty(mixed $data)
    {
        $error = [];
        $pattern = '/\S/'; // at least one character needed

        $data = preg_match($pattern, $data);
        if ($data !== 1) {
            return $error = 'Input can\'t be empty.';
        }

        return true;
    }

    public static function minMax(mixed $data, $minLength, $maxLength)
    {
        $error = [];
        $pattern = '/^.{' . $minLength . ',' . $maxLength . '}$/';

        $data = preg_match($pattern, $data);
        if ($data !== 1) {
            return $error[] =  ["Input can only be between {$minLength} and {$maxLength} characters."];
        }

        return true;
    }

    public static function isString(string $data)
    {
        $error = [];

        if (!is_string($data)) {
            return $error[] = ['Only strings allowed.'];
        }

        return true;
    }
}
