<?php

namespace Abwel\Phplace\Controllers\Pages;

use Abwel\Phplace\Utils\ViewRenderer;

class CadastroValidator {
    public static function getCadastroValidator() {
        $content = ViewRenderer::render('pages/cadastro_validator');
        return Page::getPageContent('Cadastro', $content);
    }
}