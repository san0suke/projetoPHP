<?php
$login = new Login();
$encontrado = $login->verificarLogin();

echo Utils::return_encode(array('autorizado' => $encontrado, 'token' => $login->token));