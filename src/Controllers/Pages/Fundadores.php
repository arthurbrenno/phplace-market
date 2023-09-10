<?php

namespace Abwel\Phplace\Controllers\Pages;
use       Abwel\Phplace\Utils\ViewRenderer;

/**
 * Controlador responsável por administrar a view dos fundadores.
 */
class Fundadores {

    /**
     * Renderiza o conteudo da view de fundadores.
     * @return string conteudo renderizado dos fundadores.
     */
    public static function getFundadores(): string {
        $fundadoresContent = ViewRenderer::render('pages/fundadores');
        return Page::getPageContent('Fundadores', $fundadoresContent);
    }
}