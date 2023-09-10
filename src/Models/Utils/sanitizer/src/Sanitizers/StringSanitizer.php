<?php

namespace    Abwel\Phplace\Models\Utils\sanitizer\src\Sanitizers;
require_once __DIR__ . '/../Contracts/Sanitizeable.php';
require_once __DIR__ . '/../Constants/RuleSet.php';
use          Abwel\Phplace\Models\Utils\sanitizer\src\Contracts\Sanitizeable;
use          Abwel\Phplace\Models\Utils\sanitizer\src\Constants\RuleSet;

/**
 * Representa um sanitizador de String.
 */
class StringSanitizer implements Sanitizeable {

    /**
     * Sanitiza uma String.
     * @param mixed $input string para ser sanitizada.
     * @return string|false A string sanitizada, ou FALSE se falhar.
     */
    public static function sanitize(mixed $input): mixed {
        if (!isset($input)) {
            return false;
        }

        if (!is_string($input)) {
            return false;
        }

        $length = strlen($input);

        if($length > RuleSet::MAX_STRING_LENGTH || $length < RuleSet::MIN_STRING_LENGTH) {
            return false;
        }


        return filter_var($input, FILTER_SANITIZE_STRING);
    }

    /**
     * Converte uma string para entidades HTML.
     * @param string $string string para ser convertida.
     * @return string string com as entidades HTML.
     */
    public static function convertCharsToHTMLEntities(string $string): string {
        return htmlspecialchars($string);
    }
}