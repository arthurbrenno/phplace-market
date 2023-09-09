<?php

namespace Brc\Inspector\Sanitizers;

use Brc\Inspector\Constants\RuleSet;

/**
 * Sanitizes a 32-bit integer.
 * @package Brc\Inspector\Sanitizers
 */
class Int32Sanitizer implements \Brc\Inspector\Contracts\Sanitizeable {
    public static function sanitize($input) {
        if (
            !is_int($input) ||
            $input < RuleSet::MIN_INTEGER_32_VALUE ||
            $input > RuleSet::MAX_INTEGER_32_VALUE) {

            return false;
        }

        return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
    }
}