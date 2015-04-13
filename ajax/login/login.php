<?php
$login = new Login();

if($login->verificarLogin()) {
	die(Utils::return_encode(array('token' => $login->token)));
} else {
	die(Utils::return_encode(array('erro' => Erros::LOGIN_SENHA_INVALIDA)));
}