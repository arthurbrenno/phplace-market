<?php

namespace Abwel\Phplace\Models\Utils\sanitizer\src\Validators;
use       Brc\Inspector\Constants\RuleSet;

/**
 * Represents a password validator.
 * @package Brc\Inspector\Validators
 * @see \Brc\Inspector\Constants\RuleSet
 * @see \Brc\Inspector\Contracts\Validatable
 */
class PasswordValidator implements \Brc\Inspector\Contracts\Validatable {

    /**
     * Validates a password.
     * @param $input The input to be validated.
     * @return bool checks if a password is valid.
     */
    public static function validate($input) {
        if (!is_string($input)) {
            return false;
        }

        $specialCharacters = 0;
        $numbers = 0;
        $lowerCase = 0;
        $upperCase = 0;
        $length = strlen($input);

        for ($i = 0; $i < $length; ++$i) {
            $character = $input[$i];

            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $character) && $specialCharacters < 1) {
                ++$specialCharacters;
            }

            if (preg_match('/[0-9]/', $character) && $numbers < 1) {
                ++$numbers;
            }

            if (preg_match('/[a-z]/', $character) && $lowerCase < 1) {
                ++$lowerCase;
            }

            if (preg_match('/[A-Z]/', $character) && $upperCase < 1) {
                ++$upperCase;
            }

        }

        if ($specialCharacters < 1 || $numbers < 1 || $lowerCase < 1 || $upperCase < 1 || $length < RuleSet::MIN_PASSWORD_LENGTH) {
            return false;
        }

        return true;
    }
}