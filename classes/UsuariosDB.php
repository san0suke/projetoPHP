<?php

class UsuariosDB extends Conexao {
	public function consultaLoginExistente($usu_login) {
		$sql = "SELECT * FROM usuarios WHERE usu_login = :usu_login ";
		$stm = $this->conn->prepare($sql);
		$stm->execute(array(':usu_login' => $usu_login));
		return $stm;
	}
	
	public function cadastrarUsuario($usu_login, $usu_senha) {
		$sql = "INSERT INTO usuarios (usu_login, usu_senha) VALUES (:usu_login,SHA1(:usu_senha)) ";
		$stm = $this->conn->prepare($sql);
		return $stm->execute(array(':usu_login' => $usu_login, ':usu_senha' => $usu_senha));
	}
	
}