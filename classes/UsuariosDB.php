<?php

class UsuariosDB extends Conexao {

    public function consultaLoginExistente($usu_login) {
        $sql = "SELECT * FROM usuarios WHERE usu_login = :usu_login ";
        $stm = $this->conn->prepare($sql);
        $stm->execute(array(':usu_login' => $usu_login));
        return $stm;
    }

    public function consultaLoginEdicao($usu_login, $usu_id) {
        $sql = "SELECT * FROM usuarios WHERE usu_login = :usu_login AND usu_id <> :usu_id ";
        $stm = $this->conn->prepare($sql);
        $stm->execute(array(':usu_login' => $usu_login, ':usu_id' => $usu_id));
        return $stm;
    }

    public function consultaLogins($usu_id = null) {
        $sql = "SELECT usu_id, usu_login FROM usuarios WHERE usu_status = 1 ";
        if ($usu_id != null) {
            $sql .= " AND usu_id = :usu_id";
        }
        $sql .= " ORDER BY usu_login";

        $stm = $this->conn->prepare($sql);
        if ($usu_id != null) {
            $stm->bindParam(':usu_id', $usu_id);
        }
        $stm->execute();
        return $stm;
    }

    public function cadastrarUsuario($usu_login, $usu_senha) {
        $sql = "INSERT INTO usuarios (usu_login, usu_senha) VALUES (:usu_login,SHA1(:usu_senha)) ";
        $stm = $this->conn->prepare($sql);
        return $stm->execute(array(':usu_login' => $usu_login, ':usu_senha' => $usu_senha));
    }

    public function inativarUsuario($usu_id) {
        $sql = "UPDATE usuarios SET usu_status = 0 WHERE usu_id = :usu_id ";
        $stm = $this->conn->prepare($sql);
        return $stm->execute(array(':usu_id' => $usu_id));
    }

    public function editarUsuarios($usu_id, $usu_login, $usu_senha) {
        $sql = "UPDATE usuarios SET usu_login = :usu_login ";
        if ($usu_senha != null) {
            $sql .= ",  usu_senha = SHA1(:usu_senha) ";
        }
        $sql .= " WHERE usu_id = :usu_id ";
        $stm = $this->conn->prepare($sql);

        $stm->bindParam(':usu_login', $usu_login);
        if ($usu_senha != null) {
            $stm->bindParam(':usu_senha', $usu_senha);
        }
        $stm->bindParam(':usu_id', $usu_id);

        return $stm->execute();
    }

}
