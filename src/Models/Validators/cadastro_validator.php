<?php

require_once __DIR__ . '/../../../src/Models/Utils/sanitizer/vendor/autoload.php';
require_once __DIR__ . '/../../../src/Models/Entity/User.php';
require_once __DIR__ . '/../../../src/Models/Storage/LocalDatabase.php';
require_once __DIR__ . '/../../../src/Models/Utils/sanitizer/src/Sanitizers/DatabaseSanitizer.php';
require_once __DIR__ . '/../../../src/Models/Utils/sanitizer/src/Validators/EmailValidator.php';
require_once __DIR__ . '/../../../src/Models/Utils/sanitizer/src/Validators/NameValidator.php';
require_once __DIR__ . '/../../../src/Models/Utils/sanitizer/src/Validators/PasswordValidator.php';

use Abwel\Phplace\Models\Utils\sanitizer\src\Validators\EmailValidator;
use Abwel\Phplace\Models\Utils\sanitizer\src\Validators\NameValidator;
use Abwel\Phplace\Models\Utils\sanitizer\src\Validators\PasswordValidator;
use Abwel\Phplace\Models\Utils\sanitizer\src\Sanitizers\DatabaseSanitizer;
use Abwel\Phplace\Models\Entity\User;
use Abwel\Phplace\Models\Storage\LocalDatabase;

if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['password'])) {
    header('Location: /phplace-market/cadastro?error=faltam-parametros');
    exit;
}


$name     = DatabaseSanitizer::sanitize($_POST['name']);
$email    = $_POST['email'];
$password = $_POST['password'];


if (!NameValidator::validate($name)) {
    header('Location: /phplace-market/cadastro?error=nome%20invalido');
    exit;
}

if (!EmailValidator::validate($email)) {
    header('Location: /phplace-market/cadastro?error=email%20invalido');
    exit;
}

if (!PasswordValidator::validate($password)) {
    header('Location: /phplace-market/cadastro?error=senha%20invalida');
    exit;
}

if(LocalDatabase::userExists($email, $password)) {
    header('Location: /phplace-market/cadastro?error=usuario%20ja%20cadastrado');
    exit;
}

$user = User::createUser($name, $email, $password);
$user->setLoginStatus(true);

LocalDatabase::addUser($user);

header('Location: /phplace-market/login?status=cadastrado.');
exit;

