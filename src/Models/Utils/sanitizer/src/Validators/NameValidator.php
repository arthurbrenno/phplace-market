<?php

namespace Brc\Inspector\Validators;
use Brc\Inspector\Constants\RuleSet;
use Brc\Inspector\Sanitizers\StringSanitizer;

/**
 * Represents a name validator.
 * @package Brc\Inspector\Validators
 * @see \Brc\Inspector\Sanitizers\StringSanitizer
 * @see \Brc\Inspector\Constants\RuleSet
 * @see \Brc\Inspector\Contracts\Validatable
 */
class NameValidator implements \Brc\Inspector\Contracts\Validatable {
    public static function validate($input) {

        if (!preg_match("/^[a-zA-Z ]*$/", $input)
            || strlen($input) > RuleSet::MAX_STRING_LENGTH
            || strlen($input) < RuleSet::MIN_STRING_LENGTH) {

            return false;
        }

        return true;

    }
}