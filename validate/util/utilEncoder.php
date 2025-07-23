<?php
class utilEncoder
{

    public static function checkEncodingUTF8(string $data)
    {
        $error = [];

        if (!mb_check_encoding($data, 'UTF-8')) {
            return $error[] = ['Data is not in the right encoding format (UTF8)'];
        }

        return true;
    }
}
