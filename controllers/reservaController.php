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
		$reserva->setStatus_reserva(addslashes($_POST['status']));


		$veiculo = $reserva->getId_veiculo();
		$cliente = $reserva->getCpf_cliente();
		$data_ini = $reserva->getData_inicio();
		$data_fim = $reserva->getData_fim();
		$status = $reserva->getStatus_reserva();


		$reserva->verificarDisponibilidade($veiculo,$cliente,$data_ini,$data_fim,$status);









	}
}



}

?>