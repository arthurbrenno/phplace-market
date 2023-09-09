<?php

ini_set('register_globals', 0);

require_once __DIR__ . '/../../vendor/autoload.php';

$t = \Brc\Inspector\Validators\NameValidator::validate('Arthur Brenno');
var_dump($t);
