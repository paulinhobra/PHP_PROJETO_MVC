<?php

class AdminController{

    public function index(){

        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('admin.html');

        $conteudo = $template->render();

        echo $conteudo;

    }

}