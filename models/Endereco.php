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
    private $id_cpf;


    public function inserirEnd($id_cpf,$rua,$num,$bairro,$cidade,$estado,$cep,$complemento){



        $sql = $this->db->prepare("INSERT INTO endereco SET id_cpf = ?, rua = ?, num = ?, bairro = ?, cidade = ?, estado = ?, cep = ?, complemento= ?");

        $sql->execute(array($id_cpf,$rua,$num,$bairro,$cidade,$estado,$cep,$complemento));


    }


    public function editar($rua,$num, $bairro,$cidade,$estado,$cep,$complemento,$cpf2){

    $sql = $this->db->prepare("UPDATE endereco SET rua= ?, num= ?, bairro= ?, cidade=?, estado= ?, cep= ?, complemento= ? WHERE id_cpf= ?");

    $sql->execute(array($rua,$num, $bairro,$cidade,$estado,$cep,$complemento,$cpf2));

}

public function inserirEnd_ofi($id_cpf,$rua,$num,$bairro,$cidade,$estado,$cep,$complemento){



        $sql = $this->db->prepare("INSERT INTO endereco_ofi SET id_cnpj = ?, rua = ?, num = ?, bairro = ?, cidade = ?, estado = ?, cep = ?, complemento= ?");

        $sql->execute(array($id_cpf,$rua,$num,$bairro,$cidade,$estado,$cep,$complemento));


    }


    public function editar_ofi($rua,$num, $bairro,$cidade,$estado,$cep,$complemento,$cnpj){

    $sql = $this->db->prepare("UPDATE endereco_ofi SET rua= ?, num= ?, bairro= ?, cidade=?, estado= ?, cep= ?, complemento= ? WHERE id_cnpj= ?");

    $sql->execute(array($rua,$num, $bairro,$cidade,$estado,$cep,$complemento,$cnpj));

}


//metodos get's

    public function getId_cpf(){

        return $this->id_cpf;
    }

    public function getIdEndereco() {
        return $this->idEndereco;
    }

    public function getRua() {
        return $this->rua;
    }

    public function getNum() {
        return $this->num;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getComplemento() {
        return $this->complemento;
    }


       // metdos set's


    public function setId_cpf($id_cpf) {
        $this->id_cpf = $id_cpf;
    }

    public function setRua($rua) {
        $this->rua = $rua;
    }

    public function setNum($num) {
        $this->num = $num;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }


    public function setIdEndereco($idEndereco) {
        $this->idEndereco = $idEndereco;
    }





}


?>