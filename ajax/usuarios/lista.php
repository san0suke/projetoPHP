<?php
try {
	$usuarios = new Usuarios();
	die(Utils::return_encode(array('lista' => $usuarios->listarUsuarios())));
} catch (Exception $e) {
	die(Utils::return_encode(array('erro' => $e->getMessage())));
}
