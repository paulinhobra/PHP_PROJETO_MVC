<?php

abstract class Conexao {

    private static $conn;

    public static function getConn(){

        if(self::$conn == NULL){

            self::$conn = new PDO('mysql: host=localhost; dbname=db_site;', 'root', 'root');

            return self::$conn;
            
        }       

    }

}