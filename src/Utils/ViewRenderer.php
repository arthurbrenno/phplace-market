<?php

namespace Abwel\Phplace\Utils;

class ViewRenderer {

    private static $defaultVars = [];

    public static function setDefaultVars($defaultVars = []) {
        self::$defaultVars = $defaultVars;
    }

    /**
     * Gets the raw contents of a view.
     * @param $viewName: view to be serched.
     * @return false|string contents of the view.
     */
    private static function getRawContents($viewName) {
        $viewPath = dirname(dirname(__DIR__)) . '/resources/view/' . $viewName . '.html';
        $contents = file_get_contents($viewPath);
        return $contents ?: '';
    }

    /**
     * Returns the rendered content of the view.
     * @param $viewName: to be rendered.
     * @param array $optParams;
     * @return string rendered content of the view.
     */
    public static function render($viewName, $optParams = []) {
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