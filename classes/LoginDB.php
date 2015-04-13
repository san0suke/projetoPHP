<?php

class LoginDB extends Conexao {
	public function consultaLogin($usu_login, $usu_senha) {
		$sql = "SELECT * FROM usuarios WHERE usu_login = :usu_login AND usu_senha = :usu_senha ";
		$stm = $this->conn->prepare($sql);
		$stm->execute(array(':usu_login' => $usu_login, ':usu_senha' => $usu_senha));
		return $stm;
	}
	
	public function verificarToken($usu_token) {
		$sql = "SELECT * FROM usuarios WHERE usu_token = :usu_token ";
		$stm = $this->conn->prepare($sql);
		$stm->execute(array(':usu_token' => $usu_token));
		return $stm;
	}
	
	public function updateUserKey($usu_id, $usu_token) {
		$sql = "UPDATE usuarios SET usu_token = :usu_token WHERE usu_id = :usu_id ";
		$stm = $this->conn->prepare($sql);
		$stm->execute(array(':usu_token' => $usu_token, ':usu_id' => $usu_id));
		return $stm;
	}
	
}