<?php

namespace Abwel\Phplace\Controllers\Pages;
use       Abwel\Phplace\Utils\ViewRenderer;

/**
 * Controlador responsável por administrar a view da area de login.
 */
class Login {

    /**
     * Renderiza o conteudo do login.
     * @return string conteudo renderizado da área de login.
     */
    public static function getLogin(): string {
        $loginStatus   = '';
        $errorMessage  = '';

        if (isset($_GET['status'])) {
            $loginStatus  = $_GET['status'];
        }

        if (isset($_GET['error'])) {
            $errorMessage = $_GET['error'];
        }

        $content = ViewRenderer::render('pages/login', [
            'status' => $loginStatus,
            'error'  => $errorMessage
        ]);

        return Page::getPageContent('Area de login', $content);
    }
}