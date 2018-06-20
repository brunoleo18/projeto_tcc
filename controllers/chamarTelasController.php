<?php


class chamarTelasController extends controller{

	//volta para pagina inicial do usuario adm
	public function voltar(){		

		$this->loadTemplete('usuarioAdmin');

	}

	public function telaCadastro(){

		$this->loadTemplete('cadastroUsuario');
	}

	public function telaVeiculo(){

		$this->loadTemplete('cadastroVeiculo');
	}


	public function telaCliente(){

		$this->loadTemplete('cadastroCliente');
	}


	public function telaReserva(){

		$this->loadTemplete('cadastroReserva');
	}

	public function telaOficina(){

		$this->loadTemplete('cadastroOficina');
	}

	public function telaManutencao(){

		$this->loadTemplete('cadastroManutencao');
	}



}

