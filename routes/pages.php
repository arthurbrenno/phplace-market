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