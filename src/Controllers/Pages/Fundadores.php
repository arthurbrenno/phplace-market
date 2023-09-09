<?php

namespace Abwel\Phplace\Controllers\Pages;

use Abwel\Phplace\Utils\ViewRenderer;

class Fundadores extends Page {
    public static function getFundadores() {
        $fundadoresContent = ViewRenderer::render('pages/fundadores');
        return parent::getPageContent('Fundadores', $fundadoresContent);
    }
}