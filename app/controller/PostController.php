<?php

class PostController{

    public function index($params){        
        
        try {            

			$postagem = ModelPostagem::selecionarPostId($params);                      

            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('postagem.html');

            $parametros = [];
            $parametros['titulo'] = $postagem->titulo;
            $parametros['conteudo'] = $postagem->conteudo;
            $parametros['comentarios'] = $postagem->comentarios;

            $conteudo = $template->render($parametros);

            echo $conteudo;
				
		} catch (Exception $e) {
				echo $e->getMessage();
		}
	}

}