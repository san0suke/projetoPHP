<?php
class Login {
	public $token;
	public function verificarLogin() {
		$loginDB = new LoginDB();
		$stm = $loginDB->consultaLogin($_POST['login'], $_POST['senha']);
		
		$encontrado = $stm->rowCount() == 1;
		
		if($encontrado) {
			$this->token =  md5(uniqid(rand(), true));
			$linha = $stm->fetchObject();
			if(!$loginDB->updateUserToken($linha->usu_id, $this->token)) {
				throw new ErrorException(Erros::FALHA_REGISTRAR_TOKEN);
			}
		} else {
			throw new Exception(Erros::LOGIN_SENHA_INVALIDA);
		}
	}
	
	public function verificarToken() {
		$loginDB = new LoginDB();
		$stm = $loginDB->verificarToken($_POST['token']);

		return $stm->rowCount() == 1;
	}
}