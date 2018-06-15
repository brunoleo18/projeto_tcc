<?php 

require_once "Endereco.php";

abstract class Pessoa extends model{

 	//protected $dbp = $this->db;

	private $cpf;
	private $nome;
	private $email;
	private $telefone;

	public function setCpf($cpf) {
		$this->cpf = $cpf;
	}

	public function setNome($nome){

		$this->nome = $nome;
	}


	public function setEmail($email){

		$this->email = $email;
	}

	public function setTelefone($telefone) {
		$this->telefone = $telefone;
	}


	public function getNome(){

		return $this->nome;
	}

	public function getCpf() {
		return $this->cpf;
	}

	public function getEmail(){

		return $this->email;
	}

	public function getIdPessoa() {
		return $this->idPessoa;
	}

	public function getTelefone() {
		return $this->telefone;
	}

}







?>
