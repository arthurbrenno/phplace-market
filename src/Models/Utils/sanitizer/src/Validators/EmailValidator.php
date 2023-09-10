<?php

namespace    Abwel\Phplace\Models\Utils\sanitizer\src\Validators;
require_once __DIR__ . '/../Contracts/Validatable.php';
require_once __DIR__ . '/../Sanitizers/StringSanitizer.php';
use          Abwel\Phplace\Models\Utils\sanitizer\src\Contracts\Validatable;
use          Abwel\Phplace\Models\Utils\sanitizer\src\Sanitizers\StringSanitizer;

/**
 * Representa um validador de Email.
 */
class EmailValidator implements Validatable {

    /**
     * Validates an email.
     * @param string $input The input to be validated.
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