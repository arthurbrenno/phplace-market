<?php

namespace Abwel\Phplace\Controllers\Pages;
use       Abwel\Phplace\Utils\ViewRenderer;

/**
 * Representa uma página genérica.
 * @see resources/view/pages/page.html
 */
class Page {
    const RAW_PAGE_NAME = 'pages/page';

    /**
     * Renderiza uma view genérica que contem apenas {{title}}, {{header}}, {{content}} etc...
     * Sem conter o tema geral da view, que será passado pelo parâmetro $content.
     * @param string $title titulo da pagina.
     * @param string $content conteudo da pagina.
     * @return string pagina generica renderizada.
     * @example Primeiro você renderiza a view e o conteúdo dentro dela. Por ultimo, voce chama esse metodo pra construir a pagina em si.
     */
    public static function getPageContent(string $title, string $content): string {
        return ViewRenderer::render(self::RAW_PAGE_NAME , [
            'header'  => self::getHeader(),
            'title'   => $title,
            'content' => $content,
            'footer'  => self::getFooter()
        ]);
    }

    /**
     * Renderiza o header da pagina.
     * @return string header renderizado.
     */
    private static function getHeader(): string {
        return ViewRenderer::render('pages/header');
    }

    /**
     * Renderiza o footer da pagina.
     * @return string footer renderizado.
     */
    private static function getFooter(): string {
        return ViewRenderer::render('pages/footer');
    }

}
