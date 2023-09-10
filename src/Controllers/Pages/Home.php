<?php

namespace Abwel\Phplace\Controllers\Pages;
use       Abwel\Phplace\Utils\ViewRenderer;

/**
 * Controlador responsável por administrar a view da index (home).
 */
class Home {

    /**
     * Renderiza o conteudo da home.
     * @return string conteudo renderizado da home.
     */
    public static function getHome(): string {
        $mainHomeContent = ViewRenderer::render('pages/index');
        return Page::getPageContent('Bem-vindo', $mainHomeContent);
    }
}