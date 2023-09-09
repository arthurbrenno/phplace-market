<?php

require_once __DIR__ . '/../../../src/Models/Utils/sanitizer/vendor/autoload.php';

use Brc\Inspector\Validators\EmailValidator;
use Brc\Inspector\Validators\NameValidator;
use Brc\Inspector\Validators\PasswordValidator;

if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['password'])) {
    header('Location: /phplace-market/cadastro?error=missing-params');
    exit;
}


$name     = $_POST['name'];
$email    = $_POST['email'];
$password = $_POST['password'];


if (!NameValidator::validate($name)) {
    header('Location: /phplace-market/cadastro?error=invalid-name');
    exit;
}

if (!EmailValidator::validate($email)) {
    header('Location: /phplace-market/cadastro?error=invalid-email');
    exit;
}

if (!PasswordValidator::validate($password)) {
    header('Location: /phplace-market/cadastro?error=invalid-password');
    exit;
}

header('/phplace-market/login?status=success');

