<?php
try {
	$login = new Login();
	$login->verificarLogin();
	
	die(Utils::return_encode(array('token' => $login->token)));
} catch (Exception $e) {
	die(Utils::return_encode(array('erro' => $e->getMessage())));
}
