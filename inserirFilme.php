<?php

$bd = new SQLite3("filmes.db");

$titulo     = $bd->escapeString($_POST["titulo"]);
$sinopse    = $bd->escapeString($_POST["sinopse"]);
$nota       = $bd->escapeString($_POST["nota"]);
$poster     = $bd->escapeString($_POST["poster"]);

$sql = "INSERT INTO filmes (titulo, poster, sinopse, nota) 
        VALUES (:titulo, :poster, :sinopse, :nota)";
$stmt = $bd->prepare($sql);
$stmt->bindValue(':titulo', $titulo, SQLITE3_TEXT);
$stmt->bindValue(':sinopse', $sinopse, SQLITE3_TEXT);
$stmt->bindValue(':nota', $nota, SQLITE3_FLOAT);
$stmt->bindValue(':poster', $poster, SQLITE3_TEXT);

if ($stmt->execute()) 
echo "\nfilmes inseridos com sucesso\n"; 
else 
echo "\nerro ao inserir filmes. ". $bd->lastErrorMsg(); 

header("Location: galeria.php?msg=Filme+cadastrado+com+sucesso");


?>