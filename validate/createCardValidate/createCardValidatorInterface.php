<?php 
        interface createCardValidatorInterface {
        public static function validate(mixed $data): bool|array; //array for error's
    }
?>