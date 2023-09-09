<?php

namespace Abwel\Phplace\Controllers\Pages;

use Abwel\Phplace\Utils\ViewRenderer;

class SobreNos extends Page {
    public static function getSobreNos() {
        $sobreNosContent = ViewRenderer::render('pages/sobre-nos');
        return parent::getPageContent('Sobre Nos', $sobreNosContent);
    }
}