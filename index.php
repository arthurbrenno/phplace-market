<?php

require_once __DIR__ . '/vendor/autoload.php';

use Abwel\Phplace\Http\Router;
use Abwel\Phplace\Utils\ViewRenderer;


const URL = 'http://localhost/phplace-market';

ViewRenderer::init([
    'URL' => URL
]);

$route = new Router(URL);
include __DIR__ . '/routes/pages.php';



$route->run()
     ->sendResponse();