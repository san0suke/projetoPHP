<?php

try {
    $upload = new Uploads();
    $upload->upload_arquivo('campo_arquivo');
    
    die(Utils::return_encode(array('sucesso' => true)));
} catch (Exception $e) {
    die(Utils::return_encode(array('erro' => $e->getMessage())));
}
