<?php


class Core{

	public function run(){


		$url = '/';
		$params = array();

		//verifica se foi enviado alguma coisa
		if(isset($_GET['url'])){

			
			// se foi enviado concatena url com o que foi enviado
			$url .=$_GET['url'];
		}

        // verifica se algo foi enviado e se é diferente de uma /

		if(!empty($url) && $url != '/'){

			$url = explode('/', $url);
			//remove o primeiro registro de um array
			array_shift($url);

			//se ele enviou alguma coisa o primeiro vai ser o controller

			$currentController = $url[0].'Controller';
			array_shift($url);

			//se ele enviou mais alguma coisa o segundo vai ser a action

			if(isset($url[0]) && !empty($url[0])){

				$currentAction = $url[0];

				//depois que pegamos a action removemos ela do array ai vai sobrar so os parametros

				array_shift($url);


			}else{
				$currentAction = "index";
			}


			if(count($url) > 0){

				$params = $url;
			}

		}else{

			//se não enviou nada seta o controler padrão

			$currentController = "homeController";
			$currentAction = "index";
		}


		if(!file_exists('controllers/'.$currentController.'.php') || !method_exists($currentController, $currentAction)) {
			$currentController = 'notfoundController';
			$currentAction = 'index';
		}



		$c = new $currentController();

		
		call_user_func_array(array($c,$currentAction), $params);



	}



}

