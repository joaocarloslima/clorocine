<?php

class Conexao{
    public static function criar():PDO{
        return new PDO("sqlite:filmes.db");
    }
}