<?php

$bd = new SQLite3("./db/filmes.db");

$sql = "ALTER TABLE filmes ADD COLUMN favorito INT DEFAULT 0";

if ($bd->exec($sql)) 
    echo "\ntabela filmes alterada com sucesso\n"; 
else
    echo "\nerro ao alterar tabela filmes\n"; 