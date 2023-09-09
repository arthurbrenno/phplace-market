<?php

namespace Brc\Inspector\Contracts;

interface Validatable {
    public static function validate($input);
}