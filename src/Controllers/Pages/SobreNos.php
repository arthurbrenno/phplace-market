<?php

namespace Abwel\Phplace\Controllers\Pages;

use Abwel\Phplace\Utils\ViewRenderer;

class SobreNos {
    public static function getSobreNos() {
        $sobreNosContent = ViewRenderer::render('pages/sobre-nos');
        return Page::getPageContent('Sobre Nos', $sobreNosContent);
    }
}