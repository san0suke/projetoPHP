<?php

class Login {

    public $token;

    public function verificarLogin() {
        $loginDB = new LoginDB();
        $stm = $loginDB->consultaLogin($_POST['login'], $_POST['senha']);

        $encontrado = $stm->rowCount() == 1;

        if ($encontrado) {
            $linha = $stm->fetchObject();
            if ($linha->usu_token != null) {
                $this->token = $linha->usu_token;
            } else {
                $this->token = md5(uniqid(rand(), true));
                if (!$loginDB->updateUserToken($linha->usu_id, $this->token)) {
                    throw new ErrorException(Erros::FALHA_REGISTRAR_TOKEN);
                }
            }
        } else {
            throw new Exception(Erros::LOGIN_SENHA_INVALIDA);
        }
    }

    public function verificarToken() {
        $loginDB = new LoginDB();
        $stm = $loginDB->verificarToken($_REQUEST['token']);

        return $stm->rowCount() == 1;
    }

}
