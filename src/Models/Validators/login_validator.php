<?php

require_once __DIR__ . '/../../../src/Models/Utils/sanitizer/vendor/autoload.php';
require_once __DIR__ . '/../../../src/Models/Utils/sanitizer/src/Sanitizers/DatabaseSanitizer.php';
require_once __DIR__ . '/../../../src/Models/Entity/User.php';
require_once __DIR__ . '/../../../src/Models/Storage/LocalDatabase.php';
use          Abwel\Phplace\Models\Storage\LocalDatabase;

if (!isset($_POST['email']) || !isset($_POST['password'])) {
    header('Location: /phplace-market/login?error=verifique-os-campos'); exit;
}

$email    = $_POST['email'];
$password = $_POST['password'];

if (LocalDatabase::userExists($email, $password)) {
    //TODO redirecionar para pagina de usuarios
    header('Location: /phplace-market/?status=login-success'); exit;
}

header('Location: /phplace-market/login?error=Usuario%20nao%20cadastrado%20'); exit;