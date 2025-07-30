<?php

require_once __DIR__ . "/cardValidatorInterface.php";
require_once __DIR__ . "/cardQuestionValidator.php";
require_once __DIR__ . "/cardAnswerValidator.php";

class createCardFormValidator implements createCardValidatorInterface
{

    public static function validate(mixed $data): bool|string
    {
        createCardAnswerValidator::validate($data['answer']);
        createCardQuestionValidator::validate($data['question']);

        return true;
    }
}
