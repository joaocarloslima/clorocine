<?php

$rota = $_SERVER["REQUEST_URI"];
$metodo = $_SERVER["REQUEST_METHOD"];

switch($rota){
    case "/":
        require "galeria.php";
        break;
    case "/novo":
        if($metodo == "GET") require "cadastrar.php";
        if($metodo == "POST") require "inserirFilme.php";
        break;
    default:
        require "404.php";
        break;
}

