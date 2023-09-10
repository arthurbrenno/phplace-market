<?php

namespace Abwel\Phplace\Controllers\Pages;
use       Abwel\Phplace\Utils\ViewRenderer;

/**
 * Controlador responsável por administrar a view "Sobre Nos".
 */
class SobreNos {

    /**
     * Renderiza o conteudo da view "Sobre Nos".
     * @return string conteudo renderizado da view "Sobre Nos".
     */
    public static function getSobreNos(): string {
        $sobreNosContent = ViewRenderer::render('pages/sobre-nos');
        return Page::getPageContent('Sobre Nos', $sobreNosContent);
    }
}