<?php

namespace Abwel\Phplace\Controllers\Pages;
use       Abwel\Phplace\Utils\ViewRenderer;

/**
 * Controlador responsável por administrar a view da area do cliente.
 */
class AreaDoCliente {

    /**
     * Renderiza o conteudo da area do cliente.
     * @return string conteudo renderizado da área de login.
     */
    public static function getAreaDoCliente(): string {
        $mainContent = ViewRenderer::render('pages/area-do-cliente');
        return Page::getPageContent('Area do Cliente', $mainContent);
    }
}