<?php

require_once "app/core/Core.php";
require_once "app/lib/database/Conexao.php";
require_once "app/controller/HomeController.php";
require_once "app/controller/PostController.php";
require_once "app/controller/SobreController.php";
require_once "app/controller/ErroController.php";
require_once "app/model/ModelPostagem.php";
require_once "app/model/ModelComentario.php";
require_once "vendor/autoload.php";

$template = file_get_contents("app/template/base.html");

ob_start();
	$core = new Core;
	$core->start($_GET);

	$saida = ob_get_contents();
ob_end_clean();

$tpl = str_replace('{{conteudo_dinamico}}', $saida, $template);
echo $tpl;