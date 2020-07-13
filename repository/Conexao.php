<?php

class Conexao{
    public static function criar():PDO{
        $env = (parse_ini_file('.env')) ? parse_ini_file('.env') : getenv();
        //var_dump($env);
        $connectionType = $env["DBTYPE"];
        $server = $env["HOST"];
        $database = $env["DATABASE"];
        $user = $env["DBUSER"];
        $pass = $env["PASS"];

        if ($connectionType === "mysql"){
            $databaseURL = "host=$server;dbname=$database";
        }else{
            $databaseURL = $database;
        }

        return new PDO("$connectionType:$databaseURL", $user, $pass);
    }
}