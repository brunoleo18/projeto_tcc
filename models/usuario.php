<?php 


class Usuario extends Pessoa{

    private $senha; 
    private $cpf;
    private $tipo;
    private $dataNasc;
    private $rg;
    private $sexo;
    private $id_end;

//variavel que armazena dados do select
    private $rows;

   //metodo para validar login
    public function logar($email,$senha){

        $sql = $this->db->prepare("SELECT * from usuario where email=? and senha=?");

        $sql->execute(array($email, $senha));


        $row = $sql->rowCount();
        

        if( $row > 0){

            $array = $sql->fetch();          
            
            $_SESSION['nome'] = $array['nome'];

            $this->setTipo($array['tipo']); 


        }else{

            $this->setTipo(2);
        }        
    }

    //metodo que insere usuario no banco

    public function insertUser($nome,$email,$senha, $cpf,$telefone,$tipo,$dataNasc,$rg,$sexo){

        $sql = $this->db->prepare("INSERT INTO usuario SET nome = ?, email = ?, senha = ?, cpf = ?, telefone = ?, tipo = ?, dataNasc= ?, rg= ?, sexo= ?");
        $sql->execute(array($nome,$email ,$senha, $cpf,$telefone,$tipo,$dataNasc,$rg,$sexo));

    }

 
    // exibi todos os usuarios
       
        public function exibir(){

       // $sql = $this->db->prepare("SELECT * from usuario ORDER BY tipo desc");

        $sql = $this->db->prepare("SELECT * from usuario inner join endereco on usuario.cpf = endereco.id_cpf");

        $sql->execute();


        $row = $sql->rowCount();

        $array = $sql->fetchall();

        $this->setRows($array);


    }


    public function deletar($cpf){

         $sql = $this->db->prepare("DELETE from usuario WHERE cpf= ?");

        $sql->execute(array($cpf));


    }

    

// metodos Get's-------------------------------------------------------------------------------------------------
    function getRows(){

        return $this->rows;
    }    

    function getId_end(){

        return $this->id_end;
    }    

    function getCpf() {
        return $this->cpf;
    }

    function getSenha() {
        return $this->senha;
    }



    function getTipo() {
        return $this->tipo;
    }

    function getDataNasc() {
        return $this->dataNasc;
    }

    function getRg() {
        return $this->rg;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getDataAdmis() {
        return $this->dataAdmis;
    }

      //metodos set's

    function setRows($rows) {
        $this->rows = $rows;
    }

    function setId_end($id_end) {
        $this->id_end = $id_end;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }


    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setDataNasc($dataNasc) {
        $this->dataNasc = $dataNasc;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    


}




?>