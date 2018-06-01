<?php 



class Endereco extends model{

    private $idEndereco;
    private $rua;
    private $num;
    private $bairro;
    private $cidade;
    private $estado;
    private $cep;
    private $complemento;


 public function inserirEnd($rua,$num,$bairro,$cidade,$estado,$cep,$complemento){

       
     //$this->setIdEndereco($this->db->lastInsertId());
     $sql = $this->db->prepare("INSERT INTO endereco SET rua = ?, num = ?, bairro = ?, cidade = ?, estado = ?, cep = ?, complemento= ?");

        $sql->execute(array($rua,$num,$bairro,$cidade,$estado,$cep,$complemento));

        $ult = $this->db->lastInsertId();

        $this->setIdEndereco($ult);


         }

//metodos get's

    function getIdEndereco() {
        return $this->idEndereco;
    }

    function getRua() {
        return $this->rua;
    }

    function getNum() {
        return $this->num;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCep() {
        return $this->cep;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

    function getComplemento() {
        return $this->complemento;
    }


       // metdos set's



    function setRua($rua) {
        $this->rua = $rua;
    }

    function setNum($num) {
        $this->num = $num;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setComplemento($complemento) {
        $this->complemento = $complemento;
    }


    function setIdEndereco($idEndereco) {
        $this->idEndereco = $idEndereco;
    }





}


?>