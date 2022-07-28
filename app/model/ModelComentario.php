<?php

class ModelComentario{

    public static function selecionarComentariosId($idPost){

        $con = Conexao::getConn();

        $sql = "SELECT * FROM comentario WHERE id_postagem = :id";

        $sql = $con->prepare($sql);

        $sql->bindValue(':id', $idPost, PDO::PARAM_INT);

        $sql->execute();

        $resultado = array();

        while($row = $sql->fetchObject()){

            $resultado[] = $row;

        }

        return $resultado;

    }

}