<?php

try {
    $usuarios = new Usuarios();
    $usuarios->inativarUsuario();

    die(Utils::return_encode(array('sucesso' => true)));
} catch (Exception $e) {
    die(Utils::return_encode(array('erro' => $e->getMessage())));
}
