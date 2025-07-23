<?php
class createCardAnswerValidator implements createCardValidatorInterface
{

    public static function validate(mixed $data): bool|string
    {
        $error = [];

        $isUTF8Encoded = utilEncoder::checkEncodingUTF8($data);
        if ($isUTF8Encoded !== true) {
            return $error =  'The card\'s answer is not in the right encoding format (UTF8).';
        }

        $isString = utilValidator::isString($data);
        if ($isString !== true) {
            return $error =  'The card\'s answer can only have text input.';
        }

        $isEmpty = utilValidator::isEmpty($data);
        if ($isEmpty !== true) {
            return $error =  'The card\'s answer cannot be empty.';
        }

        $minMax = utilValidator::minMax($data, 1, 250);
        if ($minMax !== true) {
            return $error =  'The card\'s answer can\'t be more than 250 characters.';
        }

        $allowedChars = preg_match('/^[\p{L}\p{N}\p{P}\p{Zs}\+\-\*\/=%\(\)\^\×\÷]*$/u', $data);
        if ($allowedChars !== 1) {
            return $error = 'The card\'s answer allows only letters, numbers, punctuations, spaces and math symbols.';
        }

        return true;
    }
}
