<?php

class ModelPostagem{

    public static function selecionarPostagens(){
        
        $con = Conexao::getConn();

        $sql = "SELECT * FROM postagem ORDER BY id DESC";
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = [];

        while($row = $sql->fetchObject('ModelPostagem')){
            array_push($resultado, $row);
        }

        if(!$resultado){
            throw new Exception("Não foi encontrado nenhum registro no banco");
        }

        return $resultado;
       
    }

}