<?php

require "./controller/FilmeController.php";

$rota = $_SERVER["REQUEST_URI"];
$metodo = $_SERVER["REQUEST_METHOD"];
$controller = new FilmeController();

if ($rota == "/") {
    require "view/galeria.php";
    exit();
}
if ($rota == "/novo"){
    if($metodo == "GET") require "view/cadastrar.php";
    if($metodo == "POST") {
        $controller->save($_REQUEST);
    }
    exit();
}

if ( substr($rota, 0, strlen("/favoritar")) === "/favoritar") {
    $controller->favorite(basename($rota));
    exit();
}
        
require "view/404.php";

