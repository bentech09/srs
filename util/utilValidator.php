<?php
class utilValidator
{

    public static function isEmpty(mixed $data)
    {
        $error = [];
        $pattern = '/\S/'; // at least one character needed

        $data = preg_match($pattern, $data);
        if ($data !== 1) {
            throw new Exception("Input cannot be empty.", 1);
        }

        return true;
    }

    public static function minMax(mixed $data, $minLength, $maxLength)
    {
        $error = [];
        $pattern = '/^.{' . $minLength . ',' . $maxLength . '}$/';

        $data = preg_match($pattern, $data);
        if ($data !== 1) {
            throw new Exception("Input can only be between {$minLength} and {$maxLength} characters.", 1);
        }

        return true;
    }

    public static function isString(string $data)
    {
        $error = [];

        if (!is_string($data)) {
            throw new Exception("Only strings allowed.", 1);
        }

        return true;
    }
}
