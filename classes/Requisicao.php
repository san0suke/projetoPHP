<?php

class Requisicao {

    public function requisicaoAjax() {
        $tokenVerificado = false;
        if (isset($_REQUEST['a']) && isset($_REQUEST['b'])) {
            if (($_REQUEST['a'] != 'login' && $_REQUEST['b'] != 'login') && isset($_REQUEST['token'])) {
                $login = new Login();
                $tokenVerificado = $login->verificarToken();
                if (!$tokenVerificado) {
                    die(Utils::return_encode(array('erro' => Erros::TOKEN_NAO_AUTORIZADO)));
                } else if ($_REQUEST['a'] == 'token' && $_REQUEST['b'] == 'token') {
                    die(Utils::return_encode(array('token_valido' => TRUE)));
                }
            }
            if (($_REQUEST['a'] == 'login' && $_REQUEST['b'] == 'login') || $tokenVerificado) {
                require_once "ajax/{$_REQUEST['a']}/{$_REQUEST['b']}.php";
            } else if (!isset($_REQUEST['token'])) {
                die(Utils::return_encode(array('erro' => Erros::TOKEN_NAO_RECEBIDO)));
            }
        } else {
            die(Utils::return_encode(array('erro' => Erros::ERRO_PARAMETROS_AB)));
        }
        die(Utils::return_encode(array('erro' => Erros::ERRO_DESCONHECIDO)));
    }

}
