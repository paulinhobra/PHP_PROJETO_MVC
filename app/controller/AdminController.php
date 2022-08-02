<?php

class AdminController{

    public function index(){

        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('admin.html');

        $objPost = ModelPostagem::selecionarPostagens();

        $parametros = array();
        $parametros['postagens'] = $objPost;

        $conteudo = $template->render($parametros);

        echo $conteudo;

    }

    public function create(){

        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('create.html');

        $conteudo = $template->render();

        echo $conteudo;

    }

    public function insert(){
        
        try{

            ModelPostagem::insert($_POST);

            echo '<script>alert("Publicação inserida com sucesso!")</script>';
            echo '<script>location.href="/?pagina=admin&metodo=index"</script>';

        }catch(Exception $e){

            echo '<script>alert("'.$e->getMessage().'")</script>';
            echo '<script>location.href="/?pagina=admin&metodo=create"</script>';

        }        

    }

    public function change($dados){

        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('update.html');

        $conteudo = $template->render();

        echo $conteudo;

    }

}