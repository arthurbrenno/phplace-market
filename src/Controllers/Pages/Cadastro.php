<?php

namespace Abwel\Phplace\Controllers\Pages;

use Abwel\Phplace\Utils\ViewRenderer;

class Cadastro {
    public static function getCadastro() {

        $error = '';

        if (isset($_GET['error'])) {
            $error = 'Não tente nos enganar ixpertinho. => ' . $_GET['error'];
        }

        $content = ViewRenderer::render('pages/cadastro', [
            'error' => $error
        ]);
        return Page::getPageContent('Cadastro', $content);
    }

}