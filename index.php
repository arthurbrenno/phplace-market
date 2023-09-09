<?php

require_once __DIR__ . '/vendor/autoload.php';
use Abwel\Phplace\Controllers\Pages\Home;
use Abwel\Phplace\Http\Response;
const URL = 'http://localhost/phplace-market';

$rota = new \Abwel\Phplace\Http\Router(URL);

$rota->get('/', [
    function() {
        return new Response(200, Home::getHome());
    }
]);


$rota->run()
     ->sendResponse();