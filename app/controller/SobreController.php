<?php

class SobreController{

    public function index($params){

        var_dump($params);exit;
        
        try {
			$postagem = ModelPostagem::selecionarPostId($params);

            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('home.html');

            $parametros = [];
            $parametros['postagens'] = $postagem;

            $conteudo = $template->render($parametros);

            echo $conteudo;

				

			$conteudo = $template->render($parametros);
			echo $conteudo;
				
		} catch (Exception $e) {
				echo $e->getMessage();
		}
	}

}