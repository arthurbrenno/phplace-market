<?php

namespace Abwel\Phplace\Controllers\Pages;
use       Abwel\Phplace\Utils\ViewRenderer;

/**
 * Controlador responsável por administrar a view da area de produtos.
 */
class Produtos {

    /**
     * Renderiza o conteudo da view de produtos.
     * @return string conteudo renderizado da view de produtos.
     */
    public static function getProdutos(): string {
        $produtosContent = ViewRenderer::render('pages/produtos');
        return Page::getPageContent('Produtos', $produtosContent);
    }
}