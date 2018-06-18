<?php


class veiculoController extends controller{



	public function index(){



	}

	public function cadastrar(){

		$veic = new veiculo;

		$veic->setPlaca(addslashes($_POST['placa']));
		$veic->setMarca(addslashes($_POST['marca']));
		$veic->setModelo(addslashes($_POST['modelo']));
		$veic->setAno_fabr(addslashes($_POST['ano']));
		$veic->setCombustivel(addslashes($_POST['combustivel']));
		$veic->setValor_diaria(addslashes($_POST['vDiaria']));
		$veic->setKm_inicial(addslashes($_POST['km_inicial']));
		$veic->setKm_atual(addslashes($_POST['km_atual']));
		$veic->setChassis(addslashes($_POST['chassis']));
		$veic->setDocumento(addslashes($_POST['documento']));

		$placa = $veic->getPlaca();
		$marca = $veic->getMarca();
		$modelo =$veic->getModelo();
		$ano_fabr = $veic->getAno_fabr();
		$combustivel = $veic->getCombustivel();
		$valor_diaria = $veic->getValor_diaria();
		$km_inicial =$veic->getKm_inicial();
		$km_atual = $veic->getKm_atual();
		$chassis = $veic->getChassis();
		$documento = $veic->getDocumento();

		$veic->inserir($placa,$modelo,$marca,$ano_fabr,$combustivel,$valor_diaria,$km_inicial,$km_atual,$chassis,$documento); 


	}

	public function mostrar(){

		$veiculo = new veiculo;

		$veiculo->exibir();

		$dados = array('dados' => $veiculo->getRowV());




		$this->loadTemplete('exibirVeiculo',$dados);
	}

	public function excluir($id){		

		$veiculo = new veiculo;

		$veiculo->deletar($id);

		header('location: http://localhost/Projeto_tcc/veiculo/mostrar');

	}


	public function editar($atualizar){


		if($atualizar != 'atualizar'){

			$veic = new veiculo;

			$veic->selectEditar($atualizar);

			$dados = array('dados' => $veic->getRowV());


			$this->loadTemplete('editarVeiculo', $dados);

		}else if($atualizar == 'atualizar'){




			var_dump($_POST);

			$veic = new veiculo;


			$veic->setId(addslashes($_POST['id']));
			$veic->setPlaca(addslashes($_POST['placa']));
			$veic->setMarca(addslashes($_POST['marca']));
			$veic->setModelo(addslashes($_POST['modelo']));
			$veic->setAno_fabr(addslashes($_POST['ano']));
			$veic->setCombustivel(addslashes($_POST['combustivel']));
			$veic->setValor_diaria(addslashes($_POST['vDiaria']));
			$veic->setKm_inicial(addslashes($_POST['km_inicial']));
			$veic->setKm_atual(addslashes($_POST['km_atual']));
			$veic->setChassis(addslashes($_POST['chassis']));
			$veic->setDocumento(addslashes($_POST['documento']));

			$id = $veic->getId();
			$placa = $veic->getPlaca();
			$marca = $veic->getMarca();
			$modelo =$veic->getModelo();
			$ano_fabr = $veic->getAno_fabr();
			$combustivel = $veic->getCombustivel();
			$valor_diaria = $veic->getValor_diaria();
			$km_inicial =$veic->getKm_inicial();
			$km_atual = $veic->getKm_atual();
			$chassis = $veic->getChassis();
			$documento = $veic->getDocumento();

			$veic->editar($id,$placa,$modelo,$marca,$ano_fabr,$combustivel,$valor_diaria,$km_inicial,$km_atual,$chassis,$documento); 



			header('location: http://localhost/Projeto_tcc/veiculo/mostrar');	

			

		}

		

	}

	public function diaria1(){

		$da = $_POST['idVeiculo'];

		$veic = new veiculo;

		$veic->diaria($da);

		$v =  $veic->getRowV();


	    echo $v;


	}


}









?>