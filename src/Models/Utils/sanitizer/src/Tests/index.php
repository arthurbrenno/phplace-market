<?php

ini_set('register_globals', 0);

require_once __DIR__ . '/../../vendor/autoload.php';

$t = \Abwel\Phplace\Models\Utils\sanitizer\src\Validators\NameValidator::validate('Arthur Brenno');
var_dump($t);
