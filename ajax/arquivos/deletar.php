<?php

try {
    $upload = new Uploads();
    $upload->deletarArquivo($_POST['arquivo']);
    
    die(Utils::return_encode(array('sucesso' => true)));
} catch (Exception $e) {
    die(Utils::return_encode(array('erro' => $e->getMessage())));
}
