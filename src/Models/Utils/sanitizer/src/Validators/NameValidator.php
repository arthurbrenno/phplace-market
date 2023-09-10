<?php

namespace Abwel\Phplace\Models\Utils\sanitizer\src\Validators;
require_once __DIR__ . '/../Constants/RuleSet.php';
require_once __DIR__ . '/../Contracts/Validatable.php';
use       Abwel\Phplace\Models\Utils\sanitizer\src\Constants\RuleSet;
use       Abwel\Phplace\Models\Utils\sanitizer\src\Sanitizers\StringSanitizer;

/**
 * Represents a name validator.
 * @package Brc\Inspector\Validators
 * @see \Abwel\Phplace\Models\Utils\sanitizer\src\Sanitizers\StringSanitizer
 * @see \Abwel\Phplace\Models\Utils\sanitizer\src\Constants\RuleSet
 * @see \Abwel\Phplace\Models\Utils\sanitizer\src\Contracts\Validatable
 */
class NameValidator implements \Abwel\Phplace\Models\Utils\sanitizer\src\Contracts\Validatable {
    public static function validate($input) {

        if (!preg_match("/^[a-zA-Z ]*$/", $input)
            || strlen($input) > RuleSet::MAX_STRING_LENGTH
            || strlen($input) < RuleSet::MIN_STRING_LENGTH) {

            return false;
        }

        return true;

    }
}