<?php

require_once __DIR__ . '/../../../src/Models/Utils/sanitizer/vendor/autoload.php';
require_once __DIR__ . '/../../../src/Models/Entity/User.php';
require_once __DIR__ . '/../../../src/Models/Storage/LocalDatabase.php';
require_once __DIR__ . '/../../../src/Models/Utils/sanitizer/src/Sanitizers/DatabaseSanitizer.php';

use Brc\Inspector\Validators\EmailValidator;
use Brc\Inspector\Validators\NameValidator;
use Brc\Inspector\Validators\PasswordValidator;
use \Abwel\Phplace\Models\Utils\sanitizer\src\Sanitizers\DatabaseSanitizer;
use Abwel\Phplace\Models\Entity\User;

if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['password'])) {
    header('Location: /phplace-market/cadastro?error=faltam-parametros');
    exit;
}


$name     = DatabaseSanitizer::sanitize($_POST['name']);
$email    = $_POST['email'];
$password = $_POST['password'];


if (!NameValidator::validate($name)) {
    header('Location: /phplace-market/cadastro?error=nome-invalido');
    exit;
}

if (!EmailValidator::validate($email)) {
    header('Location: /phplace-market/cadastro?error=email-invalido');
    exit;
}

if (!PasswordValidator::validate($password)) {
    header('Location: /phplace-market/cadastro?error=senha-invalida');
    exit;
}

if(\Abwel\Phplace\Models\Storage\LocalDatabase::userExists($email, $password)) {
    header('Location: /phplace-market/cadastro?error=usuario-ja-cadastrado');
    exit;
}

$user = \Abwel\Phplace\Models\Entity\User::createUser($name, $email, $password);
$user->setLoginStatus(true);

\Abwel\Phplace\Models\Storage\LocalDatabase::addUser($user);

header('Location: /phplace-market/login?status=cadastrado.');
exit;

