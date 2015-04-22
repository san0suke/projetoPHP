<?php

try {
    $upload = new Uploads();
    
    die(Utils::return_encode(array('lista' => $upload->lista_uploads())));
} catch (Exception $e) {
    die(Utils::return_encode(array('erro' => $e->getMessage())));
}
