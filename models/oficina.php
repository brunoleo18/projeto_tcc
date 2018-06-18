<?php 


class Oficina extends model{

    private $cnpj;      
    private $razao_social;
    private $nome_fantasia;
    private $fundacao;
    private $inscricao_social;
    private $segmento;
    private $endereco;
    private $email;
    private $telefone;

    //variavel que armazena dados do select
    private $rows;

    

    //metodo que insere usuario no banco

    public function insert($cnpj,$razao_social, $nome_fantasia ,$fundacao,$inscricao_social, $segmento,$email,$telefone){

      //verifica se o CPF ja esta cadastrado
        $sql = $this->db->prepare("SELECT * from oficina where cnpj=?");
        $sql->execute(array($cnpj));
        $row = $sql->rowCount();

        if($row > 0){

            echo "<SCRIPT>
            alert('CNPJ ja existe!');
            location.href='http://localhost/Projeto_tcc/chamarTelas/telaOficina';            
            </SCRIPT>";

            //header('location: http://localhost/Projeto_tcc/chamarTelas/telaCadastro')
            
        }else{

            // se o cpf não esta cadastrado ele passa e Aqui verifica se o EMAIL ja esta cadastrado

            $sql = $this->db->prepare("SELECT * from oficina where email=?");
            $sql->execute(array($email));
            $row = $sql->rowCount();

            if($row > 0){

                echo "<SCRIPT>
                alert('O email ".$email." ja existe!');
                location.href='http://localhost/Projeto_tcc/chamarTelas/telaOficina';
                </SCRIPT>";


            }else{

                // se nenhum dos dois esta cadastrado ele insere os dados no banco

                $sql = $this->db->prepare("INSERT INTO oficina SET cnpj = ?, razao_social = ?, nome_fantasia=?, fundacao=?, inscricao_social=?, segmento = ?, email =?, telefone= ?");

                $sql->execute(array($cnpj,$razao_social, $nome_fantasia ,$fundacao,$inscricao_social, $segmento,$email,$telefone));

                $this->getEndereco()->inserirEnd_ofi($this->getEndereco()->getId_cpf(),$this->getEndereco()->getRua(),$this->getEndereco()->getNum(),$this->getEndereco()->getBairro(),$this->getEndereco()->getCidade(),$this->getEndereco()->getEstado(),$this->getEndereco()->getCep(),$this->getEndereco()->getComplemento());

                echo "<SCRIPT>
                alert('usuario".$nome." Cadstrado com sucesso');
                location.href='http://localhost/Projeto_tcc/chamarTelas/telaOficina';
                </SCRIPT>";

            
}
        }

    }


    // exibi todos os usuarios

    public function exibir(){

       // $sql = $this->db->prepare("SELECT * from usuario ORDER BY tipo desc");

        $sql = $this->db->prepare("SELECT * from oficina left outer join endereco_ofi on oficina.cnpj = endereco_ofi.id_cnpj");

        $sql->execute();


        $row = $sql->rowCount();

        $array = $sql->fetchall();

        $this->setRows($array);


    }


    public function deletar($cnpj){

       $sql = $this->db->prepare("DELETE from oficina WHERE cnpj= ?");

       $sql->execute(array($cnpj));


   }



   public function SelectEditar($cpf_del){

    if($cpf_del != 'alt'){

        $sql = $this->db->prepare("SELECT * from cliente left outer join endereco on cliente.cpf = endereco.id_cpf where cliente.cpf = ?");

        $sql->execute(array($cpf_del));


        $row = $sql->rowCount();

        if($row > 0){

            $array = $sql->fetch();

            $this->setRows($array);
        }


    }

}


public function editar($nome,$email, $cnh ,$categoria,$profissao, $cpf,$telefone,$dataNasc,$rg,$sexo,$cpf2){

    $sql = $this->db->prepare("UPDATE cliente SET cpf= ?, nome= ?, email= ?, cnh= ?, categoria= ?, profissao=?,  telefone= ?, data_nasc= ?, rg= ?, sexo= ? WHERE cpf= ?");

    $sql->execute(array($cpf,$nome,$email, $cnh ,$categoria,$profissao, $telefone,$dataNasc,$rg,$sexo,$cpf2));



    $this->getEndereco()->editar($this->getEndereco()->getRua(),$this->getEndereco()->getNum(),$this->getEndereco()->getBairro(),$this->getEndereco()->getCidade(),$this->getEndereco()->getEstado(),$this->getEndereco()->getCep(),$this->getEndereco()->getComplemento(),$cpf2);



    
   /* echo "<SCRIPT>
    alert('Usuario <b>".$nome."</b> alterado com sucesso');
    </SCRIPT>";
   */


}


// metodos Get's-------------------------------------------------------------------------------------------------


    function getCnpj() {
        return $this->cnpj;
    }

    function getRazao_social() {
        return $this->razao_social;
    }

    function getNome_fantasia() {
        return $this->nome_fantasia;
    }

    function getFundacao() {
        return $this->fundacao;
    }

    function getInscricao_social() {
        return $this->inscricao_social;
    }

    function getSegmento() {
        return $this->segmento;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getRows() {
        return $this->rows;
    }

    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    function setRazao_social($razao_social) {
        $this->razao_social = $razao_social;
    }

    function setNome_fantasia($nome_fantasia) {
        $this->nome_fantasia = $nome_fantasia;
    }

    function setFundacao($fundacao) {
        $this->fundacao = $fundacao;
    }

    function setInscricao_social($inscricao_social) {
        $this->inscricao_social = $inscricao_social;
    }

    function setSegmento($segmento) {
        $this->segmento = $segmento;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setRows($rows) {
        $this->rows = $rows;
    }



















}




?>