<?php


class reserva extends model{

	private $id;
	private $cpf_cliente;
	private $id_veiculo;
	private $data_inicio;
	private $data_fim;
	private $km_saida;
	private $km_chegada;
	private $status_reserva;
	private $hora_saida;
	private $hora_chegada;

	private $row;


	public function verificarDisponibilidade($veiculo,$cpf,$data_inicio,$data_fim,$status){


		$sql = $this->db->prepare("SELECT * FROM reservas WHERE id_veiculo= ? AND (  NOT (data_inicio > ? OR data_fim < ?))");

		$sql->execute(array($veiculo,$data_fim,$data_inicio ));


		if($sql->rowCount() > 0){

			echo "<SCRIPT>
			alert('VEICULO NÃO DISPONIVEL NO PERIODO!');
			location.href='http://localhost/Projeto_tcc/chamarTelas/telaReserva';
			</SCRIPT>";


		}else{

			$hora_saida= "0";
			$hora_chegada="0";
			$km_saida= "0";
			$km_chegada = "0";
			$km_rodados ="0";

			$sql = $this->db->prepare("INSERT INTO reservas SET id_cliente= ?, id_veiculo= ?, data_inicio= ?, data_fim=?, status= ?, hora_saida= ?, hora_chegada= ?, km_saida=?, km_chegada= ?, km_rodados = ?");

			$sql->execute(array($cpf,$veiculo,$data_inicio,$data_fim, $status, $hora_saida, $hora_chegada, $km_saida, $km_chegada, $km_rodados));
		}





	}

	public function exibir($status){



		$sql = $this->db->prepare("SELECT reservas.id_reserva,reservas.id_cliente,cliente.nome,cliente.email,veiculo.modelo,veiculo.placa,reservas.data_inicio,reservas.data_fim,reservas.status,reservas.hora_saida,reservas.hora_chegada,reservas.km_saida,reservas.km_chegada,reservas.km_rodados FROM reservas inner join veiculo on reservas.id_veiculo=veiculo.id inner join cliente on reservas.id_cliente= cliente.cpf WHERE reservas.status = ? ");

		$sql->execute(array($status));

		if($sql->rowCount() > 0){


			$array = $sql->fetchall();

			$this->setRow($array);
		}else{


			$array = array();


			$this->setRow($array);


		}



	}




// ________metodos get's and set's__________________

	public function getId() {
		return $this->id;
	}

	public function getRow() {
		return $this->row;
	}

	
	function getCpf_cliente() {
		return $this->cpf_cliente;
	}

	function getId_veiculo() {
		return $this->id_veiculo;
	}

	function getData_inicio() {
		return $this->data_inicio;
	}

	function getData_fim() {
		return $this->data_fim;
	}

	function getKm_saida() {
		return $this->km_saida;
	}

	function getKm_chegada() {
		return $this->km_chegada;
	}

	function getStatus_reserva() {
		return $this->status_reserva;
	}

	function getHora_saida() {
		return $this->hora_saida;
	}

	function getHora_chegada() {
		return $this->hora_chegada;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setRow($row) {
		$this->row = $row;
	}

	function setCpf_cliente($cpf_cliente) {
		$this->cpf_cliente = $cpf_cliente;
	}

	function setId_veiculo($id_veiculo) {
		$this->id_veiculo = $id_veiculo;
	}

	function setData_inicio($data_inicio) {
		$this->data_inicio = $data_inicio;
	}

	function setData_fim($data_fim) {
		$this->data_fim = $data_fim;
	}

	function setKm_saida($km_saida) {
		$this->km_saida = $km_saida;
	}

	function setKm_chegada($km_chegada) {
		$this->km_chegada = $km_chegada;
	}

	function setStatus_reserva($status_reserva) {
		$this->status_reserva = $status_reserva;
	}

	function setHora_saida($hora_saida) {
		$this->hora_saida = $hora_saida;
	}

	function setHora_chegada($hora_chegada) {
		$this->hora_chegada = $hora_chegada;
	}



}


?>