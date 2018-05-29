<?php

class Controller{

	public function loadView($viewName, $dados = array()){

		require "views/".$viewName.".php";


	}

	public function loadTemplete($viewName, $dados = array()){


		require "views/templete.php";


	}

	public function loadViewInTemplete($viewName, $dados = array()){


		require "views/".$viewName.".php";



	}


}

?>