<?php

class Conexao{
    public static function criar():PDO{
        $env = parse_ini_file('.env');
        $connectionType = $env["connection"];
        $server = $env["server"];
        $database = $env["database"];
        $user = $env["user"];
        $pass = $env["pass"];

        if ($connectionType === "mysql"){
            $databaseURL = "host=$server;dbname=$database";
        }else{
            $databaseURL = $database;
        }

        return new PDO("$connectionType:$databaseURL", $user, $pass);
    }
}