<?php

abstract class Conexao {

    private static $conn;
    
    public static function getConn(){

        self::$conn = new \PDO('mysql: host=localhost; dbname=db_site;', 'root', 'root');

        return self::$conn;

    }

    public function __destruct(){
        self::$conn = NULL;
    }

}