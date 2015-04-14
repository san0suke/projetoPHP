<?php
class Usuarios {
	public function verificarUsuarios() {
		$loginDB = new UsuariosDB();
// 		$stm = $loginDB->consultaUsuarios($_POST['login'], $_POST['senha']);
		
// 		$encontrado = $stm->rowCount() == 1;
// 		if($encontrado) {
// 			$this->token =  md5(uniqid(rand(), true));
// 			$linha = $stm->fetchObject();
// 			$loginDB->updateUserKey($linha->usu_id, $this->token);
// 		}
// 		return $encontrado;
	}
}