<?php

namespace Abwel\Phplace\Models\Utils\sanitizer\src\Validators;
use       Brc\Inspector\Sanitizers\StringSanitizer;

/**
 * Represents an email validator.
 * @package Brc\Inspector\Validators
 */
class EmailValidator implements \Brc\Inspector\Contracts\Validatable {

    /**
     * Validates an email.
     * @param $input The input to be validated.
     * @return bool The sanitized input, or FALSE if it fails.
     */
    public static function validate($input): bool {
        if (!StringSanitizer::sanitize($input)) {
            return false;
        }

        $filter = filter_var($input, FILTER_VALIDATE_EMAIL);

        if ($filter === false) {
            return false;
        }

        return true;
    }

}