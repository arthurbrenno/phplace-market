<?php

namespace Abwel\Phplace\Controllers\Pages;

use Abwel\Phplace\Utils\ViewRenderer;

class Login {
    public static function getLogin() {
        $content = ViewRenderer::render('pages/login');
        return Page::getPageContent('Area de login', $content);
    }
}