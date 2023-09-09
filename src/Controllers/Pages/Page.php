<?php

namespace Abwel\Phplace\Controllers\Pages;

use Abwel\Phplace\Utils\ViewRenderer;

class Page {

    private static function getHeader() {
        return ViewRenderer::render('pages/header');
    }

    private static function getFooter() {
        return ViewRenderer::render('pages/footer');
    }

    /**
     * Gets the home page.
     * @param string $title page title
     * @param string $content page content
     * @return string rendered page
     */
    public static function getPage($title, $content) {
        return ViewRenderer::render('pages/page', [
            'header'  => self::getHeader(),
            'title'   => $title,
            'content' => $content,
            'footer'  => self::getFooter()
        ]);
    }
}