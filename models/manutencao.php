<?php


class manutencao extends model{



	private $id;
	private $data_manut;
	private $id_veiculo;
	private $id_oficina;
	private $km;
	private $status;
	private $tipo;
	private $servico;
	private $descricao;
	private $valor;
	private $data_retorno;

	private $row;


	public function inserir($data_manut,$id_veiculo,$id_oficina,$km,$status,$tipo,$servico,$descricao,$valor,$data_retorno){

		$sql = $this->db->prepare("INSERT INTO manutencao SET data_ida= ?, id_veiculo= ?, id_oficina= ?, km=?, status= ?, tipo= ?, servico= ?, descricao= ?, valor=?, data_retorno= ? ");

		$sql->execute(array($data_manut,$id_veiculo,$id_oficina,$km,$status,$tipo,$servico,$descricao,$valor,$data_retorno));
	}

	public function exibir($status){


		$sql = $this->db->prepare("SELECT * FROM manutencao inner join veiculo on manutencao.id_veiculo=veiculo.id inner join oficina on manutencao.id_oficina=oficina.cnpj where status=?");
		$sql->execute(array($status));

		if($sql->rowCount() > 0){


			$array = $sql->fetchall();

			$this->setRow($array);
		}else{


			$array = array();


			$this->setRow($array);


		}



	}


	public function deletar($id){

		$sql = $this->db->prepare("DELETE FROM manutencao where id=?");


			$sql->execute(array($id));

			echo "<script>alert('excluido com sucesso);</script>";



	}



	public function SelectEditar($id_manut){

		if($id_manut != 'alt'){

			$sql = $this->db->prepare("SELECT manutencao.*, veiculo.modelo,veiculo.placa, veiculo.km_a, oficina.nome_fantasia FROM manutencao inner join veiculo on manutencao.id_veiculo=veiculo.id inner join oficina on manutencao.id_oficina=oficina.cnpj  where manutencao.id = ?");

			$sql->execute(array($id_manut));


			$row = $sql->rowCount();

			if($row > 0){

				$array = $sql->fetch();

				$this->setRow($array);
			}


		}

	}


	
	public function editar($id,$data_manut,$id_veiculo,$id_oficina,$km,$status,$tipo,$servico,$descricao,$valor,$data_retorno){

		

		$sql = $this->db->prepare("UPDATE manutencao SET data_ida= ?, id_veiculo=?, id_oficina=?,  km=?, status=?, tipo=?, servico=?, descricao=?, valor=?, data_retorno=? where id=?");

		$sql->execute(array($data_manut,$id_veiculo,$id_oficina,$km,$status,$tipo,$servico,$descricao,$valor,$data_retorno,$id));


		echo "<SCRIPT>
			alert('Manutençao atualizada com sucesso');
			
			</SCRIPT>";





	}


//___________metodos get's and set's_____________________________________________


	function getId() {
		return $this->id;
	}

	function getData_manut() {
		return $this->data_manut;
	}

	function getId_veiculo() {
		return $this->id_veiculo;
	}

	function getId_oficina() {
		return $this->id_oficina;
	}

	function getKm() {
		return $this->km;
	}


	function getStatus() {
		return $this->status;
	}

	function getTipo() {
		return $this->tipo;
	}

	function getServico() {
		return $this->serviço;
	}

	function getDescricao() {
		return $this->descricao;
	}

	function getValor() {
		return $this->valor;
	}

	function getData_retorno() {
		return $this->data_retorno;
	}

	function getRow() {
		return $this->row;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setData_manut($data_manut) {
		$this->data_manut = $data_manut;
	}

	function setId_veiculo($id_veiculo) {
		$this->id_veiculo = $id_veiculo;
	}

	function setId_oficina($id_oficina) {
		$this->id_oficina = $id_oficina;
	}

	function setKm($km) {
		$this->km = $km;
	}

	function setStatus($status) {
		$this->status = $status;
	}

	function setTipo($tipo) {
		$this->tipo = $tipo;
	}

	function setServico($serviço) {
		$this->serviço = $serviço;
	}

	function setDescricao($descricao) {
		$this->descricao = $descricao;
	}

	function setValor($valor) {
		$this->valor = $valor;
	}

	function setData_retorno($data_retorno) {
		$this->data_retorno = $data_retorno;
	}


	function setRow($row) {
		$this->row = $row;
	}






}



?>