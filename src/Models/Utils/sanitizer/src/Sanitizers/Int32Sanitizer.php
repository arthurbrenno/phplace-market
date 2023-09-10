<?php

namespace    Abwel\Phplace\Models\Utils\sanitizer\src\Sanitizers;
require_once __DIR__ . '/../Constants/RuleSet.php';
require_once __DIR__ . '/../Contracts/Sanitizeable.php';
use          Abwel\Phplace\Models\Utils\sanitizer\src\Contracts\Sanitizeable;
use          Abwel\Phplace\Models\Utils\sanitizer\src\Constants\RuleSet;

/**
 * Representa um sanitizador de inteiro 32 bits.
 */
class Int32Sanitizer implements Sanitizeable {

    /**
     * Sanitiza uma entrada int 32 bits.
     * @param mixed $input inteiro a ser sanitizado.
     * @return mixed|false variavel sanitizada.
     */
    public static function sanitize(mixed $input): mixed {
        if (
            !is_int($input) ||
            $input < RuleSet::MIN_INTEGER_32_VALUE ||
            $input > RuleSet::MAX_INTEGER_32_VALUE) {

            return false;
        }

        return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
    }
}