<?php


class manutencaoController extends controller{

	public function index(){


	}


	public function inserir(){


		var_dump($_POST);




		$manu = new manutencao;


		$manu->setData_manut(addslashes($_POST['data']));
		$manu->setId_veiculo(addslashes($_POST['veiculo']));
		$manu->setId_oficina(addslashes($_POST['Oficina']));
		$manu->setKm(addslashes($_POST['km']));
		$manu->setStatus(addslashes($_POST['status']));
		$manu->setTipo(addslashes($_POST['tipo']));
		$manu->setServico(addslashes($_POST['servico']));
		$manu->setDescricao(addslashes($_POST['descricao']));
		$manu->setValor(addslashes($_POST['total']));
		$manu->setData_retorno(addslashes($_POST['data_retorno']));


		$data_manut = $manu->getData_manut();
		$id_veiculo = $manu->getId_veiculo();
		$id_oficina = $manu->getId_oficina();
		$km = $manu->getKm();
		$status = $manu->getStatus();
		$tipo = $manu->getTipo();
		$servico = $manu->getServico();
		$descricao = $manu->getDescricao();
		$valor = $manu->getValor();
		$data_retorno = $manu->getData_retorno();






		$manu->inserir($data_manut,$id_veiculo,$id_oficina,$km,$status,$tipo,$servico,$descricao,$valor,$data_retorno);




		header("location:".BASE_URL."chamarTelas/telaManutencao");

		
	}

	public function mostrar($status){

		if($status == 'aberta'){

			$manu = new manutencao;

			$manu->exibir($status);

			$dados = array('dados' => $manu->getRow());

			$this->loadTemplete('exibirManutencao',$dados);
		}else if($status == 'fechada'){

			$manu = new manutencao;

			$manu->exibir($status);

			$dados = array('dados' => $manu->getRow());

			$this->loadTemplete('exibirManutencao',$dados);

		}

	}


	public function excluir($id_manutencao){

		$manut = new manutencao;

		$manut->deletar($id_manutencao);


		header("location:".BASE_URL."manutencao/mostrar/aberta");





	}


	public function editar($id_manu){


		if($id_manu != 'alt'){

			$manut = new manutencao;

			$manut->selectEditar($id_manu);
			$dados2 = array('info' => $manut->getRow());

			$this->loadTemplete('editarManutencao',$dados2);


		}else if($id_manu == 'alt'){

			//var_dump($_POST);


			$manu = new manutencao;


			$manu->setId(addslashes($_POST['id']));

			$manu->setData_manut(addslashes($_POST['data']));
			$manu->setId_veiculo(addslashes($_POST['veiculo']));
			$manu->setId_oficina(addslashes($_POST['Oficina']));
			$manu->setKm(addslashes($_POST['km']));
			$manu->setStatus(addslashes($_POST['status']));
			$manu->setTipo(addslashes($_POST['tipo']));
			$manu->setServico(addslashes($_POST['servico']));
			$manu->setDescricao(addslashes($_POST['descricao']));
			$manu->setValor(addslashes($_POST['total']));
			$manu->setData_retorno(addslashes($_POST['data_retorno']));

			$id = $manu->getId();

			$data_manut = $manu->getData_manut();
			$id_veiculo = $manu->getId_veiculo();
			$id_oficina = $manu->getId_oficina();
			$km = $manu->getKm();
			$status = $manu->getStatus();
			$tipo = $manu->getTipo();
			$servico = $manu->getServico();
			$descricao = $manu->getDescricao();
			$valor = $manu->getValor();
			$data_retorno = $manu->getData_retorno();






			$manu->editar($id,$data_manut,$id_veiculo,$id_oficina,$km,$status,$tipo,$servico,$descricao,$valor,$data_retorno);





			header('location: http://localhost/Projeto_tcc/manutencao/mostrar/'.$status);	






		}






	}





}

?>










?>