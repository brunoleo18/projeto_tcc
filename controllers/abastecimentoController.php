<?php

class abastecimentoController extends controller{




	public function index(){


	}


	public function inserir(){

		var_dump($_POST);

		$abast = new Abastecimento;

		$abast->setData(addslashes($_POST['data_ab']));
		$abast->setId_veiculo(addslashes($_POST['veiculo']));
		$abast->setKm(addslashes($_POST['km']));
		$abast->setPosto(addslashes($_POST['posto']));
		$abast->setCombustivel(addslashes($_POST['combustivel']));
		$abast->setUnidade(addslashes($_POST['unidade']));
		$abast->setQuant(addslashes($_POST['quant']));
		$abast->setPreco_unit(addslashes($_POST['valor_unit']));
		$abast->setTotal(addslashes($_POST['total']));



		$data_abs = $abast->getData();
		$id_veiculo = $abast->getId_veiculo();
		$km = $abast->getKm();
		$posto = $abast->getPosto();
		$combustivel = $abast->getCombustivel();
		$unidade = $abast->getUnidade();
		$quant = $abast->getQuant();
		$preco_unit = $abast->getPreco_unit();
		$total =  $abast->getTotal();


		$abast->inserir($data_abs,$id_veiculo,$km,$posto,$combustivel,$unidade,$quant,$preco_unit,$total);

		header("location:".BASE_URL."chamarTelas/telaAbastecimento");





	}


	public function mostrar(){

		$abast = new Abastecimento;

		$abast->exibir();

		$dados = array('info' => $abast->getRows());

		$this->loadTemplete('exibirAbastecimento',$dados);
	}


	public function mostrarTot(){

		//var_dump($_POST);
		$abast = new Abastecimento;

		$id = addslashes($_POST['veiculo']);
		$data_ini  = addslashes($_POST['data_ini']);
		$data_fim  = addslashes($_POST['data_fim']);

		$abast->exibirTot($id,$data_fim,$data_ini);

		$dados1 = array('totale' => $abast->getRows());

		$this->loadTemplete('exibirAbastecimento',$dados1);

	}


	public function excluir($id){

		$abast = new Abastecimento;

		$abast->deletar($id);

		
		header("location:".BASE_URL."Abastecimento/mostrar");


	}

	public function editar($id_p){

		
		if($id_p != 'alt'){

			$abast = new Abastecimento;

			$abast->selectEditar($id_p);
			$dados2 = array('info' => $abast->getRows());

			$this->loadTemplete('editarAbastecimento',$dados2);


		}else if($id_p == 'alt'){


			$abast = new Abastecimento;

			$abast->setId(addslashes($_POST['id']));

			$abast->setData(addslashes($_POST['data_ab']));
			$abast->setId_veiculo(addslashes($_POST['veiculo']));
			$abast->setKm(addslashes($_POST['km']));
			$abast->setPosto(addslashes($_POST['posto']));
			$abast->setCombustivel(addslashes($_POST['combustivel']));
			$abast->setUnidade(addslashes($_POST['unidade']));
			$abast->setQuant(addslashes($_POST['quant']));
			$abast->setPreco_unit(addslashes($_POST['valor_unit']));
			$abast->setTotal(addslashes($_POST['total']));

			$id = $abast->getId();

			$data_abs = $abast->getData();
			$id_veiculo = $abast->getId_veiculo();
			$km = $abast->getKm();
			$posto = $abast->getPosto();
			$combustivel = $abast->getCombustivel();
			$unidade = $abast->getUnidade();
			$quant = $abast->getQuant();
			$preco_unit = $abast->getPreco_unit();
			$total =  $abast->getTotal();


			$abast->editar($id,$data_abs,$id_veiculo,$km,$posto,$combustivel,$unidade,$quant,$preco_unit,$total);

			
			
			header("location:".BASE_URL."abastecimento/mostrar");
			





		}


	}

}







?>