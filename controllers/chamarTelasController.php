<?php


class chamarTelasController extends controller{

	//volta para pagina inicial do usuario adm
	public function voltar(){		

		$this->loadTemplete('usuarioAdmin');

	}

	public function telaCadastro(){

		$this->loadTemplete('cadastroUsuario');
	}




}

