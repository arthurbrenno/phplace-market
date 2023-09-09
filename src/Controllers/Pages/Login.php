<?php

namespace Abwel\Phplace\Controllers\Pages;

use Abwel\Phplace\Utils\ViewRenderer;

class Login {
    public static function getLogin() {

        $status = '';
        $error  = '';

        if (isset($_GET['status'])) {
            $status = $_GET['status'];
        }

        if (isset($_GET['error'])) {
            $error = $_GET['error'];
        }

        $content = ViewRenderer::render('pages/login', [
            'status' => $status,
            'error'  => $error
        ]);
        return Page::getPageContent('Area de login', $content);
    }
}