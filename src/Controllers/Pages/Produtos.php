<?php

namespace Abwel\Phplace\Controllers\Pages;

use Abwel\Phplace\Utils\ViewRenderer;

class Produtos extends Page {
    public static function getProdutos() {
        $produtosContent = ViewRenderer::render('pages/produtos');
        return parent::getPageContent('Produtos', $produtosContent);
    }
}