<?php 

require_once __DIR__ . "/createCardValidatorInterface.php";
require_once __DIR__ . "/createCardQuestionValidator.php";
require_once __DIR__ . "/createCardAnswerValidator.php";

    Class createCardFormValidator implements createCardValidatorInterface {

        public static function validate(mixed $data): bool|string {
            $error = [];

            $dataAnswer = createCardAnswerValidator::validate($data['answer']);
            if($dataAnswer !== true) {
                $error = $dataAnswer;
            }

            $dataQuestion = createCardQuestionValidator::validate($data['question']);
            if($dataQuestion !== true) {
                $error =  $dataQuestion;
            }

            if (!empty($error)) {
                return $error;
            }

            return true;
        }
    }
?>