<?php

namespace Abwel\Phplace\Utils;

/**
 * Responsavel por renderizar uma view.
 */
class ViewRenderer {

    /**
     * @var array $defaultVars variaveis default da view. Exemplo: URL
     */
    private static array $defaultVars = [];

    /**
     * Setter. Seta as variaveis default da ViewRenderer.
     * @param array $defaultVars variaveis padrao da View.
     * @return void
     */
    public static function setDefaultVars($defaultVars = []) {
        self::$defaultVars = $defaultVars;
    }

    /**
     * Pega os conteudos "crus" da view.
     * @param string $viewName view para ser procurada.
     * @return false|string conteudos da view.
     */
    private static function getRawContents(string $viewName): false|string {
        $viewPath = dirname(__DIR__, 2) . '/resources/view/' . $viewName . '.html';
        $contents = file_get_contents($viewPath);
        return $contents ?: '';
    }

    /**
     * Renderiza os conteudos da view com os parametros a serem substituidos na view.
     * @param string $viewName view para ser renderizada.
     * @param array $optParams parametros para substituir;
     * @return string conteudo final renderizado da view.
     */
    public static function render(string $viewName, array $optParams = []): string {
        $viewContents   = self::getRawContents($viewName);
        $optParams      = array_merge(self::$defaultVars, $optParams);
        $keys           = array_keys($optParams);
        $originalValues = array_values($optParams);

        $newKeys = array_map(function($item) {
            return '{{' . $item . '}}';
        }, $keys);

        $newContent = str_replace($newKeys, $originalValues, $viewContents);

        return $newContent;
    }
}