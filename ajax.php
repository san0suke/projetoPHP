<?php
header("Access-Control-Allow-Origin: *");

require_once 'autoload.php';
require_once 'constantes.php';
Utils::post_decode();
$requisicao = new Requisicao();
$requisicao->requisicaoAjax();