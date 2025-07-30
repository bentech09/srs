<?php
class createCardAnswerValidator implements createCardValidatorInterface
{

    public static function validate(mixed $data): bool|string
    {
        utilEncoder::checkEncodingUTF8($data);
        utilValidator::isString($data);
        utilValidator::isEmpty($data);
        utilValidator::minMax($data, 1, 250);

        $allowedChars = preg_match('/^[\p{L}\p{N}\p{P}\p{Zs}\+\-\*\/=%\(\)\^\×\÷]*$/u', $data);
        if ($allowedChars !== 1) {
            throw new Exception("The card answer allows only letters, numbers, punctuations, spaces and math symbols.", 1);
        }

        return true;
    }
}
