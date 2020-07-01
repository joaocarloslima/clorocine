<?php

session_start();
require "./repository/FilmesRepositoryPDO.php";
require "./model/Filme.php";

$filmesRepository = new FilmesRepositoryPDO();
$filme = new Filme();

$filme->titulo     = $_POST["titulo"];
$filme->sinopse    = $_POST["sinopse"];
$filme->nota       = $_POST["nota"];
$filme->poster     = $_POST["poster"];

if ($filmesRepository->salvar($filme)) 
        $_SESSION["msg"] = "Filme cadastrado com sucesso";
else 
        $_SESSION["msg"] = "Erro ao cadastrar filme";

header("Location: /");

?>