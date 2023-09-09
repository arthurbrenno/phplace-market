<?php

use Abwel\Phplace\Http\Response;
use Abwel\Phplace\Controllers\Pages;

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