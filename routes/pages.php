<?php

require_once dirname(__DIR__) . '/src/Models/Static/Constants.php';

use Abwel\Phplace\Http\Response;
use Abwel\Phplace\Controllers\Pages;
use Abwel\Phplace\Http\Router;
use Abwel\Phplace\Models\Static\Constants;

/**
 * Inicia a rota principal do aplicativo no localhost.
 * @return void
 */
function startMainRoute(): void {
    $route = new Router(Constants::URL);

    $route->addGetRoute('/', [
        function() {
            return new Response(200, Pages\Home::getHome());
        }
    ]);

    $route->addGetRoute('/produtos', [
        function() {
            return new Response(200, Pages\Produtos::getProdutos());
        }
    ]);

    $route->addGetRoute('/fundadores', [
        function() {
            return new Response(200, Pages\Fundadores::getFundadores());
        }
    ]);

    $route->addGetRoute('/sobre-nos', [
        function() {
            return new Response(200, Pages\SobreNos::getSobreNos());
        }
    ]);

    $route->addGetRoute('/pagina/{idPagina}/{acao}', [
        function($idPagina, $acao) {
            return new Response(200, 'Pagina ' . $idPagina . ' - ' . $acao);
        }
    ]);

    $route->addGetRoute('/area-do-cliente', [
        function() {
            return new Response(200, Pages\AreaDoCliente::getAreaDoCliente());
        }
    ]);

    $route->addGetRoute('/cadastro', [
        function() {
            return new Response(200, Pages\Cadastro::getCadastro());
        }
    ]);

    $route->addPostRoute('/cadastro', [
        function() {
            return new Response(200, Pages\Cadastro::getCadastro());
        }
    ]);

    $route->addGetRoute('/login', [
        function() {
            return new Response(200, Pages\Login::getLogin());
        }
    ]);

    $route->run()
          ->sendResponse();
}

