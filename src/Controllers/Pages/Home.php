<?php

namespace Abwel\Phplace\Controllers\Pages;

use Abwel\Phplace\Utils\ViewRenderer;

class Home extends Page {
    /**
     * Retorna a view da home
     * @return string conteúdo da home renderizado.
     */
    public static function getHome() {
        $mainHomeContent = ViewRenderer::render('pages/index');
        return parent::getPage('Bem-vindo', $mainHomeContent);
    }
}