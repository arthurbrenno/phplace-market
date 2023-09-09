<?php

namespace Abwel\Phplace\Controllers\Pages;

use Abwel\Phplace\Utils\ViewRenderer;

class Produtos extends Page {
    public static function getProdutos() {
        $produtosContent = ViewRenderer::render('pages/produtos');
        return Page::getPageContent('Produtos', $produtosContent);
    }
}