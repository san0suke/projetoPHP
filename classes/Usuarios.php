<?php
class Usuarios {
	public function cadastrarUsuarios() {
		$loginDB = new UsuariosDB();
		$stm = $loginDB->consultaLoginExistente($_POST['usu_login']);
		$encontrado = $stm->rowCount() == 1;
		if($encontrado) {
			throw new Exception(Erros::LOGIN_JA_CADASTRADO);
		}
		
		if(!$loginDB->cadastrarUsuario($_POST['usu_login'], $_POST['usu_senha'])) {
			throw new Exception(Erros::FALHA_CADASTRAR);			
		}
	}
}