<?php

namespace Abwel\Phplace\Controllers\Pages;
use Abwel\Phplace\Utils\ViewRenderer;

class AreaDoCliente {
    public static function getAreaDoCliente() {
        $mainContent = ViewRenderer::render('pages/area-do-cliente');
        return Page::getPageContent('Area do Cliente', $mainContent);
    }
}