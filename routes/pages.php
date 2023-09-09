<?php

use Abwel\Phplace\Http\Response;
use Abwel\Phplace\Controllers\Pages;

$rota->get('/', [
    function() {
        return new Response(200, Pages\Home::getHome());
    }
]);


$rota->get('/produtos', [
    function() {
        return new Response(200, Pages\Produtos::getProdutos());
    }
]);

$rota->get('/fundadores', [
    function() {
        return new Response(200, Pages\Fundadores::getFundadores());
    }
]);

$rota->get('/sobre-nos', [
    function() {
        return new Response(200, Pages\SobreNos::getSobreNos());
    }
]);

$rota->get('/area-do-cliente', [
    function() {
        return new Response(200, Pages\AreaDoCliente::getAreaDoCliente());
    }
]);