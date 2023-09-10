<?php

namespace Abwel\Phplace\Models\Utils\sanitizer\src\Contracts;

/**
 * Interface Funcional.
 * Representa um objeto que pode ser sanitizado.
 */
interface Sanitizeable {
    /**
     * @param mixed $input
     * @return mixed
     */
    public static function sanitize(mixed $input): mixed;
}