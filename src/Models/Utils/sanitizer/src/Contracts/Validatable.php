<?php

namespace Abwel\Phplace\Models\Utils\sanitizer\src\Contracts;

/**
 * Interface funcional. Representa Uma classe que valida dados.
 */
interface Validatable {
    public static function validate($input);
}