<?php 

class reservaController extends controller{

	public function index(){


	}


	public function inserir(){


		var_dump($_POST);


		$reserva = new reserva;

		if(!empty($_POST['veiculo'])){


			$reserva->setId_veiculo(addslashes($_POST['veiculo']));
			$reserva->setCpf_cliente(addslashes($_POST['cpf']));
			$reserva->setData_inicio(addslashes($_POST['data_ini']));
			$reserva->setData_fim(addslashes($_POST['data_Fim']));
			$reserva->setValor_reserva(addslashes($_POST['total1']));
			$reserva->setStatus_reserva(addslashes($_POST['status']));


			$veiculo = $reserva->getId_veiculo();
			$cliente = $reserva->getCpf_cliente();
			$data_ini = $reserva->getData_inicio();
			$data_fim = $reserva->getData_fim();
			$status = $reserva->getStatus_reserva();
			$valor_reserva=$reserva->getValor_reserva();


			$reserva->verificarDisponibilidade($veiculo,$cliente,$data_ini,$data_fim,$valor_reserva,$status);


			if(empty($reserva->getRow())){

			header("location:".BASE_URL."chamarTelas/telaReserva");

		}else{

			echo "<SCRIPT>
			alert('VEICULO NÃO DISPONIVEL NO PERIODO!');
			location.href='http://localhost/Projeto_tcc/chamarTelas/telaReserva';
			</SCRIPT>";
		}
	}
}

	public function mostrar($status){

		if($status == 'aberta'){

			$reserva = new reserva;

			$reserva->exibir($status);

			$dados = array('dados' => $reserva->getRow());

			$this->loadTemplete('exibirReserva',$dados);
		}else if($status == 'andamento'){

			$reserva = new reserva;

			$reserva->exibir($status);

			$dados = array('dados' => $reserva->getRow());

			$this->loadTemplete('exibirReserva',$dados);

		}else{

			$reserva = new reserva;

			$reserva->exibir($status);

			$dados = array('dados' => $reserva->getRow());

			$this->loadTemplete('exibirReserva',$dados);
		}


	}


	public function excluir($id_reserva){

		$reser = new reserva;

		$reser->deletar($id_reserva);


		header("location:".BASE_URL."reserva/mostrar/aberta");





	}


	public function editar($id_reserva){


		if($id_reserva != 'alt'){

			$reser = new reserva;

		$reser->selectEditar($id_reserva);
		$dados2 = array('info' => $reser->getRow());

		$this->loadTemplete('editarReserva',$dados2);


		}else if($id_reserva == 'alt'){


			$reserva = new reserva;

			
			$reserva->setId(addslashes($_POST['id']));


			$reserva->setId_veiculo(addslashes($_POST['veiculo']));
			$reserva->setCpf_cliente(addslashes($_POST['cpf']));
			$reserva->setData_inicio(addslashes($_POST['data_ini']));
			$reserva->setData_fim(addslashes($_POST['data_Fim']));
			$reserva->setValor_reserva(addslashes($_POST['total1']));
			$reserva->setStatus_reserva(addslashes($_POST['status']));
			$reserva->setHora_saida(addslashes($_POST['hora_saida']));
			$reserva->setHora_chegada(addslashes($_POST['hora_chegada']));
			$reserva->setKm_saida(addslashes($_POST['km_saida']));
			$reserva->setKm_chegada(addslashes($_POST['km_chegada']));
			$reserva->setKm_rodados(addslashes($_POST['Km_rodados']));




			$id = $reserva->getId();


			$veiculo = $reserva->getId_veiculo();
			$cliente = $reserva->getCpf_cliente();
			$data_ini = $reserva->getData_inicio();
			$data_fim = $reserva->getData_fim();
			$status = $reserva->getStatus_reserva();
			$valor_reserva=$reserva->getValor_reserva();
			$hora_saida = $reserva->getHora_saida();
			$hora_chegada = $reserva->getHora_chegada();
			$km_saida = $reserva->getKm_saida();
			$km_chegada= $reserva->getKm_chegada();
			$km_rodados = $reserva->getKm_rodados();


			$reserva->editar($id,$veiculo,$cliente,$data_ini,$data_fim,$status,$valor_reserva,$hora_saida,$hora_chegada,$km_saida,$km_chegada,$km_rodados);


			header('location: http://localhost/Projeto_tcc/reserva/mostrar/'.$status);	
			





		}





		
	}


	


}

?>