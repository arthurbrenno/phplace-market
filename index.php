<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/Models/Static/Constants.php';
include      __DIR__ . '/routes/pages.php';
use          Abwel\Phplace\Models\Static\Constants;
use          Abwel\Phplace\Utils\ViewRenderer;

ini_set('register_globals', 0);

ViewRenderer::setDefaultVars([
    'URL' => Constants::URL
]);

startMainRoute();