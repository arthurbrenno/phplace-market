<?php

namespace Abwel\Phplace\Controllers\Pages;
use Abwel\Phplace\Utils\ViewRenderer;

class AreaDoCliente extends Page {
    public static function getAreaDoCliente() {
        $mainContent = ViewRenderer::render('pages/area-do-cliente');
        return parent::getPageContent('Area do Cliente', $mainContent);
    }
}