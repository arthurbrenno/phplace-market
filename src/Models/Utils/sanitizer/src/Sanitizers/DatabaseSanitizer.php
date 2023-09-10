<?php

namespace    Abwel\Phplace\Models\Utils\sanitizer\src\Sanitizers;
require_once __DIR__ . '/../Contracts/Sanitizeable.php';
use          Abwel\Phplace\Models\Utils\sanitizer\src\Contracts\Sanitizeable;

/**
 * Representa um sanitizador para Banco de Dados.
 */
class DatabaseSanitizer implements Sanitizeable {

    /**
     * Sanitiza a entrada com base em comuns ataques de SQL Injection.
     * @param mixed $input para ser sanitizado.
     * @return mixed entrada sanitizada
     */
    public static function sanitize(mixed $input): mixed {
        //TODO ainda nao implementado, sei que essa implementacao abaixo nao faz sentido.
        return str_replace('DROP TABLE', '', $input);
    }
}