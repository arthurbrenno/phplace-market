<?php

require_once __DIR__ . '/sanitizer/src';
use Brc\Inspector\Validators;

if (!isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    header('Location: /cadastro?error=missing-params');
    exit;
}

$name     = $_POST['name'];
$email    = $_POST['email'];
$password = $_POST['password'];

if (!Validators\NameValidator::validate($name)) {
    header('Location: /cadastro?error=invalid-name');
    exit;
}

if (!Validators\EmailValidator::validate($email)) {
    header('Location: /cadastro?error=invalid-email');
    exit;
}

if (!Validators\PasswordValidator::validate($password)) {
    header('Location: /cadastro?error=invalid-password');
    exit;
}

