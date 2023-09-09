<?php

require_once __DIR__ . '/../../../src/Models/Utils/sanitizer/vendor/autoload.php';
require_once __DIR__ . '/../../../src/Models/Utils/sanitizer/src/Sanitizers/DatabaseSanitizer.php';
require_once __DIR__ . '/../../../src/Models/Entity/User.php';
require_once __DIR__ . '/../../../src/Models/Storage/LocalDatabase.php';

use \Abwel\Phplace\Models\Utils\sanitizer\src\Sanitizers\DatabaseSanitizer;

if (!isset($_POST['email']) || !isset($_POST['password'])) {
    header('Location: /phplace-market/login?error=verifique-os-campos'); exit;
}

$email    = $_POST['email'];
$password = $_POST['password'];

if (\Abwel\Phplace\Models\Storage\LocalDatabase::userExists($email, $password)) {
    //TODO redirecionar para pagina de usuarios
    header('Location: /phplace-market/'); exit;
}

header('Location: /phplace-market/login?error=usuario-nao-cadastrado'); exit;