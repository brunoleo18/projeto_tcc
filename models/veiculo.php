<?php


class veiculo extends modelAbstract{

	private $id;
	private $placa;
	private $modelo;
	private $marca;
	private $ano_fabr;
	private $combustivel;
	private $valor_diaria;
	private $km_inicial;
	private $Km_atual;
	private $chassis;
	private $documento;

	private $rowV;

//--------------------------------------------------------------------------------

	public function exibir(){

		$sql =$this->db->prepare("SELECT * FROM veiculo");
		$sql->execute();



		$array = $sql->fetchall();


		$this->setRowV($array);


	}


	public function inserir($placa,$modelo,$marca,$ano_fabr,$combustivel,$valor_diaria,$km_inicial,$Km_atual,$chassis,$documento){



		$sql = $this->db->prepare("SELECT * from veiculo where placa=?");
		$sql->execute(array($placa));
		$row = $sql->rowCount();

		if($row > 0){

			echo "<SCRIPT>
			alert('Carro já esta cadastrado');
			location.href='http://localhost/Projeto_tcc/chamarTelas/telaVeiculo';            
			</SCRIPT>";

            //header('location: http://localhost/Projeto_tcc/chamarTelas/telaCadastro')

		}else{

			$sql = $this->db->prepare("INSERT INTO veiculo SET placa = ?, modelo = ?, marca = ?, ano_fabri = ?,  combustivel= ?, valor_d = ?, km_i= ?, Km_a= ?, chassi= ?, documento= ?");

			$sql->execute(array($placa,$modelo,$marca,$ano_fabr,$combustivel,$valor_diaria,$km_inicial,$Km_atual,$chassis,$documento));




			echo "<SCRIPT>
			alert('Veiculo de placa ".$placa." Cadastrado com sucesso');
			location.href='http://localhost/Projeto_tcc/chamarTelas/telaVeiculo';
			</SCRIPT>";

		}

	}



	public function deletar($id){

		$sql = $this->db->prepare("DELETE from veiculo WHERE id= ?");

		$sql->execute(array($id));


	}

	public function selectEditar($id){

		$sql = $this->db->prepare("SELECT * FROM veiculo where id= ?");

		$sql->execute(array($id));


		$row = $sql->rowCount();

		if($row > 0){

			$array = $sql->fetch();

			$this->setRowV($array);


		}



	}

	public function editar($id,$placa,$modelo,$marca,$ano_fabr,$combustivel,$valor_diaria,$km_inicial,$km_atual,$chassis,$documento){


		$sql = $this->db->prepare("UPDATE veiculo SET  placa = ?, modelo = ?, marca = ?, ano_fabri = ?,  combustivel= ?, valor_d = ?, km_i= ?, Km_a= ?, chassi= ?, documento= ? WHERE id= ?");

		$sql->execute(array($placa,$modelo,$marca,$ano_fabr,$combustivel,$valor_diaria,$km_inicial,$km_atual,$chassis,$documento, $id));


		echo "<SCRIPT>
			alert('Veiculo de placa ".$placa.", alterado com sucesso');
			
			</SCRIPT>";



	}

	public function diaria($id){


		$sql = $this->db->prepare("SELECT * FROM veiculo where id= ?");

		$sql->execute(array($id));

		$row = $sql->fetch(PDO::FETCH_OBJ);
		$valor = $row->valor_d;

		
		$this->setRowV($valor);

}	

//metodos get's e set's

	public function getId() {
		return $this->id;
	}

	function getPlaca() {
		return $this->placa;
	}

	function getModelo() {
		return $this->modelo;
	}

	function getMarca() {
		return $this->marca;
	}

	function getAno_fabr() {
		return $this->ano_fabr;
	}

	function getCombustivel() {
		return $this->combustivel;
	}

	function getValor_diaria() {
		return $this->valor_diaria;
	}

	function getKm_inicial() {
		return $this->km_inicial;
	}

	function getKm_atual() {
		return $this->Km_atual;
	}

	function getChassis() {
		return $this->chassis;
	}

	function getDocumento() {
		return $this->documento;
	}

	function getRowV() {
		return $this->rowV;
	}


//_____________________________________________________________



	function setId($id) {
		$this->id = $id;
	}

	function setPlaca($placa) {
		$this->placa = $placa;
	}

	function setModelo($modelo) {
		$this->modelo = $modelo;
	}

	function setMarca($marca) {
		$this->marca = $marca;
	}

	function setAno_fabr($ano_fabr) {
		$this->ano_fabr = $ano_fabr;
	}

	function setCombustivel($combustivel) {
		$this->combustivel = $combustivel;
	}

	function setValor_diaria($valor_diaria) {
		$this->valor_diaria = $valor_diaria;
	}

	function setKm_inicial($km_inicial) {
		$this->km_inicial = $km_inicial;
	}

	function setKm_atual($Km_atual) {
		$this->Km_atual = $Km_atual;
	}

	function setChassis($chassis) {
		$this->chassis = $chassis;
	}

	function setDocumento($documento) {
		$this->documento = $documento;
	}

	function setRowV($rowV) {
		$this->rowV = $rowV;
	}



}





?>