<?php

class Usuarios {

    public function cadastrarUsuarios() {
        $loginDB = new UsuariosDB();
        $stm = $loginDB->consultaLoginExistente($_POST['usu_login']);
        $encontrado = $stm->rowCount() == 1;
        if ($encontrado) {
            throw new Exception(Erros::LOGIN_JA_CADASTRADO);
        }

        if (!$loginDB->cadastrarUsuario($_POST['usu_login'], $_POST['usu_senha'])) {
            throw new Exception(Erros::FALHA_CADASTRAR);
        }
    }
    
    public function editarUsuarios() {
        if(empty($_POST['usu_id'])) {
            throw new Exception(Erros::ID_NAO_RECEBIDO);
        }
        
        $loginDB = new UsuariosDB();
        $stm = $loginDB->consultaLoginEdicao($_POST['usu_login'], $_POST['usu_id']);
        $encontrado = $stm->rowCount() == 1;
        if ($encontrado) {
            throw new Exception(Erros::LOGIN_JA_CADASTRADO);
        }

        $usu_senha = trim($_POST['usu_senha']) == '' ? null : $_POST['usu_senha'];
        if (!$loginDB->editarUsuarios($_POST['usu_id'], $_POST['usu_login'], $usu_senha)) {
            throw new Exception(Erros::FALHA_EDITAR);
        }
    }
    
    public function inativarUsuario() {
        if(empty($_POST['usu_id'])) {
            throw new Exception(Erros::ID_NAO_RECEBIDO);
        }
        
        $loginDB = new UsuariosDB();
        if (!$loginDB->inativarUsuario($_POST['usu_id'])) {
            throw new Exception(Erros::FALHA_INATIVAR);
        }
    }

    public function listarUsuarios() {
        $loginDB = new UsuariosDB();
        $stm = $loginDB->consultaLogins();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function consultaUsuario() {
        $loginDB = new UsuariosDB();
        
        if(empty($_POST['usu_id'])) {
            throw new Exception(Erros::ID_NAO_RECEBIDO);
        }
        
        $stm = $loginDB->consultaLogins($_POST['usu_id']);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

}
