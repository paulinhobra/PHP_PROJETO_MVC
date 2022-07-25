<?php

class ModelPostagem{

    public static function selecionarPostagens(){
        
        $con = new PDO('mysql: host=localhost; dbname=db_site;', 'root', 'root');

        var_dump($con);
    }

}