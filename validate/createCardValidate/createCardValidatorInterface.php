<?php
interface createCardValidatorInterface
{
    public static function validate(mixed $data): bool|string; //array for error's
}
