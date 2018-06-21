<?php



class Abastecimento extends modelAbstract{


	private $id;
	private $data;
	private $id_veiculo;
	private $km;
	private $posto;
	private $combustivel;
	private $unidade;
	private $quant;
	private $preco_unit;
	private $total;


	private $rows;



	public function inserir($data_abs,$id_veiculo,$km,$posto,$combustivel,$unidade,$quant,$preco_unit,$total){

		$sql = $this->db->prepare("INSERT INTO abastecimento SET data_abs= ?, id_veiculo= ?, km= ?, posto=?, combustivel= ?, unidade= ?, quant= ?, preco_unit= ?, total=? ");

		$sql->execute(array($data_abs,$id_veiculo,$km,$posto,$combustivel,$unidade,$quant,$preco_unit,$total));
	}




	public function exibir(){


		$sql = $this->db->prepare("SELECT * FROM abastecimento inner join veiculo on abastecimento.id_veiculo=veiculo.id");
		$sql->execute(array());

		if($sql->rowCount() > 0){


			$array = $sql->fetchall();

			$this->setRows($array);
		}else{


			$array = array();


			$this->setRow($array);


		}


	}

	public function exibirTot($id,$data_fim,$data_ini){


		$sql = $this->db->prepare("SELECT veiculo.id,veiculo.modelo,veiculo.placa,abastecimento.combustivel,sum(abastecimento.total) as valor_t FROM abastecimento inner join veiculo on abastecimento.id_veiculo=veiculo.id WHERE (veiculo.id=?) AND abastecimento.data_abs BETWEEN (?) AND (?) ");
		$sql->execute(array($id,$data_ini,$data_fim));

		if($sql->rowCount() > 0){


			$array = $sql->fetchall();

			$this->setRows($array);
		}else{


			$array = array();


			$this->setRowS($array);


		}


	}




	public function deletar($id){

		$sql = $this->db->prepare("DELETE FROM abastecimento where id=?");


		$sql->execute(array($id));


	}


	public function SelectEditar($id_p){

		if($id_p != 'alt'){

			$sql = $this->db->prepare("SELECT abastecimento.*,veiculo.modelo,veiculo.placa from abastecimento inner join veiculo on abastecimento.id_veiculo=veiculo.id  where abastecimento.id = ?");

			$sql->execute(array($id_p));


			$row = $sql->rowCount();

			if($row > 0){

				$array = $sql->fetch();

				$this->setRows($array);
			}


		}

	}


	public function editar($id,$data_abs,$id_veiculo,$km,$posto,$combustivel,$unidade,$quant,$preco_unit,$total){

		

		$sql = $this->db->prepare("UPDATE abastecimento SET data_abs=?, id_veiculo=?, km=?, posto= ?, combustivel=?, unidade=?, quant=?, preco_unit=?, total=? where id=?");

		$sql->execute(array($data_abs,$id_veiculo,$km,$posto,$combustivel,$unidade,$quant,$preco_unit,$total,$id));

		echo "<SCRIPT>
		alert('Reserva atualizada com sucesso');

		</SCRIPT>";



	}


	function getId() {
		return $this->id;
	}

	function getData() {
		return $this->data;
	}

	function getId_veiculo() {
		return $this->id_veiculo;
	}

	function getKm() {
		return $this->km;
	}

	function getPosto() {
		return $this->posto;
	}

	function getCombustivel() {
		return $this->combustivel;
	}

	function getUnidade() {
		return $this->unidade;
	}

	function getQuant() {
		return $this->quant;
	}

	function getPreco_unit() {
		return $this->preco_unit;
	}

	function getTotal() {
		return $this->total;
	}

	function getRows() {
		return $this->rows;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setData($data) {
		$this->data = $data;
	}

	function setId_veiculo($id_veiculo) {
		$this->id_veiculo = $id_veiculo;
	}

	function setKm($km) {
		$this->km = $km;
	}

	function setPosto($posto) {
		$this->posto = $posto;
	}

	function setCombustivel($combustivel) {
		$this->combustivel = $combustivel;
	}

	function setUnidade($unidade) {
		$this->unidade = $unidade;
	}

	function setQuant($quant) {
		$this->quant = $quant;
	}

	function setPreco_unit($preco_unit) {
		$this->preco_unit = $preco_unit;
	}

	function setTotal($total) {
		$this->total = $total;
	}

	function setRows($rows) {
		$this->rows = $rows;
	}




}






?>