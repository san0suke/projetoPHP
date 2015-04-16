<?php
header("Access-Control-Allow-Origin: *");

require_once 'autoload.php';
require_once 'constantes.php';
$requisicao = new Requisicao();
$requisicao->requisicaoAjax();