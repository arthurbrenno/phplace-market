<?php

require_once __DIR__ . '/vendor/autoload.php';
use Abwel\Phplace\Controllers\Pages\Home;

echo "<pre>";
$response = new \Abwel\Phplace\Http\Response(200, "ola mundoooo");
$response->sendResponse();
echo "</pre>";


exit;
echo Home::getHome();
