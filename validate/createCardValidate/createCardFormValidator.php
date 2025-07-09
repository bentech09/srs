<?php 

require_once __DIR__ . "/createCardValidatorInterface.php";
require_once __DIR__ . "/createCardQuestionValidator.php";
require_once __DIR__ . "/createCardAnswerValidator";

    Class createCardFormValidator implements createCardValidatorInterface {

        public static function validate(mixed $data): bool|array {
            $error = [];

            $dataQuestion = createCardQuestionValidator::validate($data['question']);
            if($dataQuestion !== true) {
                $error[''] =  $dataQuestion;
            }

            $dataAnswer = createCardAnswerValidator::validate($data['answer']);
            if($dataAnswer !== true) {
                $error[''] = $dataAnswer;
            }

            if (!empty($error)) {
                return [
                    'formError' => 'There were errors in the form. Please review and correct them.',
                    'fields' => $error
                ];
            }

            return true;
        }
    }
?>