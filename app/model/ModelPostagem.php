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

    public static function selecionarPostId($id){

            $con = Conexao::getConn();

			$sql = "SELECT * FROM postagem WHERE id = :id";
			$sql = $con->prepare($sql);
			$sql->bindValue(':id', $id, PDO::PARAM_INT);
			$sql->execute();            

			$resultado = $sql->fetchObject();

			if (!$resultado) {
				throw new Exception("Não foi encontrado nenhum registro no banco");	
			} else{
                $resultado->comentarios = ModelComentario::selecionarComentariosId($resultado->id);                
            }

			return $resultado;
    }

    public static function insert($dados){

        if(empty($dados['titulo']) || empty($dados['conteudo'])){

            throw new Exception("Preencha todos os campos!");
            
            return false;

        }

        $con = Conexao::getConn();

        $sql = "INSERT INTO postagem(titulo, conteudo) VALUES(:tit, :cont)";

        $sql = $con->prepare($sql);

        $sql->bindValue(':tit', $dados['titulo']);
        $sql->bindValue(':cont', $dados['conteudo']);        

        $res = $sql->execute();        

    }

}