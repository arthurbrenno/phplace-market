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

    $route->get('/', [
        function() {
            return new Response(200, Pages\Home::getHome());
        }
    ]);

    $route->get('/produtos', [
        function() {
            return new Response(200, Pages\Produtos::getProdutos());
        }
    ]);

    $route->get('/fundadores', [
        function() {
            return new Response(200, Pages\Fundadores::getFundadores());
        }
    ]);

    $route->get('/sobre-nos', [
        function() {
            return new Response(200, Pages\SobreNos::getSobreNos());
        }
    ]);

    $route->get('/pagina/{idPagina}/{acao}', [
        function($idPagina, $acao) {
            return new Response(200, 'Pagina ' . $idPagina . ' - ' . $acao);
        }
    ]);

    $route->get('/area-do-cliente', [
        function() {
            return new Response(200, Pages\AreaDoCliente::getAreaDoCliente());
        }
    ]);

    $route->get('/cadastro', [
        function() {
            return new Response(200, Pages\Cadastro::getCadastro());
        }
    ]);

    $route->post('/cadastro', [
        function() {
            return new Response(200, Pages\Cadastro::getCadastro());
        }
    ]);

    $route->get('/login', [
        function() {
            return new Response(200, Pages\Login::getLogin());
        }
    ]);

    $route->run()
          ->sendResponse();
}

