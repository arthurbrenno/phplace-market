<?php

namespace Abwel\Phplace\Models\Utils\sanitizer\src\Sanitizers;

use Brc\Inspector\Contracts\Sanitizeable;

class DatabaseSanitizer {
    public static function sanitize($input) {
        //TODO ainda nao implementado, sei que essa implementacao nao faz sentido.
        return str_replace('DROP TABLE', '', $input);
    }
}