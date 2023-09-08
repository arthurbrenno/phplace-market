<?php

namespace Abwel\Phplace\Utils;

class ViewRenderer {


    /**
     * Gets the raw contents of a view.
     * @param $viewName: view to be serched.
     * @return false|string contents of the view.
     */
    private static function getRawContents($viewName) {
        $viewPath = dirname(dirname(__DIR__)) . '/resources/view/pages/' . $viewName . '.html';
        return file_get_contents($viewPath);
    }

    /**
     * Returns the rendered content of the view.
     * @param $viewName: to be rendered.
     * @return string rendered content of the view.
     */
    public static function render($viewName) {
        $viewContents = self::getRawContents($viewName);
    }
}