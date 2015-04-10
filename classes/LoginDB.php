<?php

class LoginDB extends Conexao {
	public function consultaLogin($login, $senha) {
		$sql = "SELECT * FROM usuarios WHERE usu_login = '$login' AND usu_senha = '$senha' ";
		return $this->conn->query($sql);
	}
	
	public function updateUserKey($usu_id, $token) {
		$sql = "UPDATE usuarios SET usu_token = '$token' WHERE usu_id = $usu_id ";
		return $this->conn->query($sql);
	}
	
}