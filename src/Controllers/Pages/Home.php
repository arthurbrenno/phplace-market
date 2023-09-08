<?php

namespace Abwel\Phplace\Controllers\Pages;

use Abwel\Phplace\Utils\ViewRenderer;

class Home {
    /**
     * Retorna a view da home
     * @return string conteúdo da home renderizado.
     */
    public static function getHome() {
        return ViewRenderer::render('pages/index', array('name' => 'Arthur'));
    }
}