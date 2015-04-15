<?php
class Usuarios {
	public function cadastrarUsuarios() {
		$loginDB = new UsuariosDB();
		$stm = $loginDB->consultaLoginExistente($_POST['usu_login']);
		$encontrado = $stm->rowCount() == 1;
		if($encontrado) {
			throw new Exception(Erros::LOGIN_JA_CADASTRADO);
		}
		
// 		$stm = $loginDB->cadastrarUsuario($_POST['usu_login'], $_POST['usu_senha']);
		
// 		$encontrado = $stm->rowCount() == 1;
// 		if($encontrado) {
// 			$this->token =  md5(uniqid(rand(), true));
// 			$linha = $stm->fetchObject();
// 			$loginDB->updateUserKey($linha->usu_id, $this->token);
// 		}
// 		return $encontrado;
	}
}