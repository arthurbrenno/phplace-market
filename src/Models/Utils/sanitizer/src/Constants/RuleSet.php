<?php

namespace Abwel\Phplace\Models\Utils\sanitizer\src\Constants;

/**
 * Conjunto de regras pre-definidas a respeito dos dados recebidos.
 */
class RuleSet {
    const MAX_STRING_LENGTH    = 255;
    const MIN_STRING_LENGTH    = 4;
    const MAX_INTEGER_32_VALUE = 2147483647;
    const MIN_INTEGER_32_VALUE = -2147483648;
    const MIN_PASSWORD_LENGTH  = 8;
}