<?php

namespace Abwel\Phplace\Controllers\Pages;

use Abwel\Phplace\Utils\ViewRenderer;

class Cadastro {
    public static function getCadastro() {
        $content = ViewRenderer::render('pages/cadastro');
        return Page::getPageContent('Cadastro', $content);
    }

}