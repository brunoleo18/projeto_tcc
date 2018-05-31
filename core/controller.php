<?php

class Controller{

	public function loadView($viewName, $dados = array()){
		extract($dados);

		require "views/".$viewName.".php";	

	}

	public function loadTemplete($viewName, $dados = array()){

		extract($dados);
		require "views/templete.php";		


	}

	public function loadViewInTemplete($viewName, $dados = array()){

		extract($dados);
		require "views/".$viewName.".php";		



	}


}

?>