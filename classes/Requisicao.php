<?php
class Requisicao {
	public function requisicaoAjax() {
		$tokenVerificado = false;
		if(isset($_POST['a']) && isset($_POST['b'])) {
			if(($_POST['a'] != 'login' && $_POST['b'] != 'login') && isset($_POST['token'])) {
				$login = new Login();
				$tokenVerificado = $login->verificarToken();
				if(!$tokenVerificado) {
					die(Utils::return_encode(array('erro' => Erros::TOKEN_NAO_AUTORIZADO)));
				} else if ($_POST['a'] == 'token' && $_POST['b'] == 'token') {
					die(Utils::return_encode(array('token_valido' => TRUE)));
				}
			}
			if(($_POST['a'] == 'login' && $_POST['b'] == 'login') || $tokenVerificado) {
				require_once "ajax/{$_POST['a']}/{$_POST['b']}.php";
			}
		} else {
			die(Utils::return_encode(array('erro' => Erros::ERRO_PARAMETROS_AB)));
		}
		die(Utils::return_encode(array('erro' => Erros::ERRO_DESCONHECIDO)));
	}
}