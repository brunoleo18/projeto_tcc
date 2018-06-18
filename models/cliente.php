<?php 


class Cliente extends Pessoa{

    private $profissao; 
    private $categoria; 
    private $cnh;
    private $dataNasc;
    private $rg;
    private $sexo;
    private $endereco;
    private $id_end;

    //variavel que armazena dados do select
    private $rows;

    

    //metodo que insere usuario no banco

    public function insert($nome,$email, $cnh ,$categoria,$profissao, $cpf,$telefone,$dataNasc,$rg,$sexo){

      //verifica se o CPF ja esta cadastrado
        $sql = $this->db->prepare("SELECT * from cliente where cpf=?");
        $sql->execute(array($cpf));
        $row = $sql->rowCount();

        if($row > 0){

            echo "<SCRIPT>
            alert('CPF ja existe!');
            location.href='http://localhost/Projeto_tcc/chamarTelas/telaCliente';            
            </SCRIPT>";

            //header('location: http://localhost/Projeto_tcc/chamarTelas/telaCadastro')
            
        }else{

            // se o cpf não esta cadastrado ele passa e Aqui verifica se o EMAIL ja esta cadastrado

            $sql = $this->db->prepare("SELECT * from cliente where email=?");
            $sql->execute(array($email));
            $row = $sql->rowCount();

            if($row > 0){

                echo "<SCRIPT>
                alert('O email ".$email." ja existe!');
                location.href='http://localhost/Projeto_tcc/chamarTelas/telaCliente';
                </SCRIPT>";


            }else{

                // se nenhum dos dois esta cadastrado ele insere os dados no banco

                $sql = $this->db->prepare("INSERT INTO cliente SET nome = ?, email = ?, cnh=?, categoria=?, profissao=?, cpf = ?, telefone = ?, data_Nasc= ?, rg= ?, sexo= ?");
                $sql->execute(array($nome,$email, $cnh ,$categoria,$profissao, $cpf,$telefone,$dataNasc,$rg,$sexo));

                $this->getEndereco()->inserirEnd($this->getEndereco()->getId_cpf(),$this->getEndereco()->getRua(),$this->getEndereco()->getNum(),$this->getEndereco()->getBairro(),$this->getEndereco()->getCidade(),$this->getEndereco()->getEstado(),$this->getEndereco()->getCep(),$this->getEndereco()->getComplemento());

                echo "<SCRIPT>
                alert('usuario".$nome." Cadstrado com sucesso');
                location.href='http://localhost/Projeto_tcc/chamarTelas/telaCliente';
                </SCRIPT>";

            }

        }

    }


    // exibi todos os usuarios

    public function exibir(){

       // $sql = $this->db->prepare("SELECT * from usuario ORDER BY tipo desc");

        $sql = $this->db->prepare("SELECT * from cliente left outer join endereco on cliente.cpf = endereco.id_cpf ORDER BY nome asc");

        $sql->execute();


        $row = $sql->rowCount();

        $array = $sql->fetchall();

        $this->setRows($array);


    }


    public function deletar($cpf){

       $sql = $this->db->prepare("DELETE from cliente WHERE cpf= ?");

       $sql->execute(array($cpf));


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

public function nome($cpf){


        $sql = $this->db->prepare("SELECT * FROM cliente where cpf= ?");

        $sql->execute(array($cpf));


        if($sql->rowCount() > 0){

        $row = $sql->fetch(PDO::FETCH_OBJ);
        $valor = $row->nome;        
        $this->setRows($valor);

    }else{

        $this->setRows("");
    }

    }

// metodos Get's-------------------------------------------------------------------------------------------------
function getRows(){

    return $this->rows;
}    

function getId_end(){

    return $this->id_end;
}    



function getProfissao() {
    return $this->profissao;
}

function getCnh() {
    return $this->cnh;
}



function getCategoria() {
    return $this->categoria;
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

public function getEndereco(){

    return $this->endereco;
}

      //metodos set's

function setRows($rows) {
    $this->rows = $rows;
}

function setId_end($id_end) {
    $this->id_end = $id_end;
}



function setProfissao($profissao) {
    $this->profissao = $profissao;
}

function setCnh($cnh) {
    $this->cnh = $cnh;
}


function setCategoria($categoria) {
    $this->categoria = $categoria;
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

function setEndereco($endereco){

    $this->endereco = $endereco;

}




}




?>