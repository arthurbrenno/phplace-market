<?php

namespace Brc\Inspector\Contracts;

interface Sanitizeable {
    /**
     * @param $input
     * @return bool
     */
    public static function sanitize($input);
}