<?php

try {
    $usuarios = new Usuarios();
    die(Utils::return_encode(array('registro' => $usuarios->consultaUsuario())));
} catch (Exception $e) {
    die(Utils::return_encode(array('erro' => $e->getMessage())));
}
