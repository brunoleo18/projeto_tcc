<?php
class notfoundController extends controller {

	public function index() {
		
		$dados = array(

			'url'=> 'bruno'



		);

		$this->loadTemplete('404', $dados);

		
	}

}