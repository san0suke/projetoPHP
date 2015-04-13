<?php
header("Access-Control-Allow-Origin: *");

require_once 'autoload.php';
$requisicao = new Requisicao();
$requisicao->requisicaoAjax();