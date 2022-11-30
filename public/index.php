<?php

//solicitando ao composer que gerencie o carregamento automagico dos arquivos

include_once '../vendor/autoload.php';

session_start();

include '../config/database.php';

$rotas = require '../config/routes.php';

$url = $_SERVER['REQUEST_URI']; //pegando a url acessada pelo usuario
$rota = explode('?', $url)[0]; //separando a url, atraves do "?"

if (false === isset($rotas[$rota])) {
    echo "Erro 404";
    exit;
}

$controller = $rotas[$rota]['controller'];
$method = $rotas[$rota]['method'];

(new $controller)->$method();