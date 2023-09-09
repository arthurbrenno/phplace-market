<?php

require_once __DIR__ . '/vendor/autoload.php';

use Abwel\Phplace\Http\Router;

use Abwel\Phplace\Controllers\Pages\Produtos;


const URL = 'http://localhost/phplace-market';

$rota = new Router(URL);
require_once __DIR__ . '/routes/pages.php';





$rota->run()
     ->sendResponse();