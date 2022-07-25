<?php

class HomeController{

    public function index(){
        
        try{
            
            $postagens = ModelPostagem::selecionarPostagens();

            //Teste do retorno
            var_dump($postagens);

        }catch(Exception $e){
            echo $e->getMessage();
        }

    }

}