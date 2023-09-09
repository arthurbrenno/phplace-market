<?php

namespace Abwel\Phplace\Controllers\Pages;

use Abwel\Phplace\Utils\ViewRenderer;

class Page {
    const RAW_PAGE_NAME = 'pages/page';

    /**
     * Gets the raw/any page content.
     * @param string $title page title
     * @param string $content page content
     * @return string rendered page
     */
    public static function getPageContent($title, $content) {
        return ViewRenderer::render(self::RAW_PAGE_NAME , [
            'header'  => self::getHeader(),
            'title'   => $title,
            'content' => $content,
            'footer'  => self::getFooter()
        ]);
    }
    private static function getHeader() {
        return ViewRenderer::render('pages/header');
    }

    private static function getFooter() {
        return ViewRenderer::render('pages/footer');
    }

}
