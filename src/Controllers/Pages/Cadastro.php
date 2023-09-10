<?php

namespace Abwel\Phplace\Controllers\Pages;
use       Abwel\Phplace\Utils\ViewRenderer;

/**
 * Controlador responsável por administrar a view da area de cadastro.
 */
class Cadastro {

    /**
     * Renderiza o conteudo da area de cadastro.
     * @return string conteudo renderizado da área de cadastro.
     */
    public static function getCadastro(): string {
        $errorMessage = '';

        if (isset($_GET['error'])) {
            $errorMessage = 'Não tente nos enganar ixpertinho => ' . $_GET['error'];
        }

        $content = ViewRenderer::render('pages/cadastro', [
            'error' => $errorMessage
        ]);

        return Page::getPageContent('Cadastro', $content);
    }

}