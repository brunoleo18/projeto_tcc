<?php 

require_once "Endereco.php";

 class Pessoa extends model{

 	//protected $dbp = $this->db;

 	private $idPessoa;
    private $nome;
 	private $endereco;
 	private $email;
 	private $telefone;

 	public function setNome($nome){

 		$this->nome = $nome;
 	}

 	public function setEndereco($endereco){

 		$this->endereco = $endereco;

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


 	public function getEndereco(){

 		return $this->endereco;
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
