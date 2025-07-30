<?php
class utilEncoder
{

    public static function checkEncodingUTF8(string $data)
    {
        $error = [];

        if (!mb_check_encoding($data, 'UTF-8')) {
            throw new Exception("Data is not in the right encoding format (UTF8)", 1);
        }

        return true;
    }
}
