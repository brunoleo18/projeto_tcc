<?php


class usuarioController extends controller{



	public function index(){

		$user = new Usuario;

		$user->setEmail(addslashes($_POST['email']));
		$user->setSenha(addslashes($_POST['senha']));

		$user->logar($user->getEmail(),$user->getSenha());

		if($user->getTipo() == 1){

			$this->loadTemplete('usuarioAdmin');
		}else{

			$this->loadTemplete('telaUsuario');

		}

	}

	public function teste(){

		echo "testando";
	}


}


?>