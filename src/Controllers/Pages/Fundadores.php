<?php

namespace Abwel\Phplace\Controllers\Pages;

use Abwel\Phplace\Utils\ViewRenderer;

class Fundadores {
    public static function getFundadores() {
        $fundadoresContent = ViewRenderer::render('pages/fundadores');
        return Page::getPageContent('Fundadores', $fundadoresContent);
    }
}