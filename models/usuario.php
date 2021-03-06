<?php 


class Usuario extends Pessoa{

    private $titulo;
    private $senha; 
    private $tipo;
    private $dataNasc;
    private $rg;
    private $sexo;
    

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

    public function inserir($nome,$email,$senha, $cpf,$telefone,$titulo,$tipo,$dataNasc,$rg,$sexo){

      //verifica se o CPF ja esta cadastrado
        $sql = $this->db->prepare("SELECT * from usuario where cpf=?");
        $sql->execute(array($cpf));
        $row = $sql->rowCount();

        if($row > 0){

            echo "<SCRIPT>
            alert('CPF ja existe!');
            location.href='http://localhost/Projeto_tcc/chamarTelas/telaCadastro';            
            </SCRIPT>";

            //header('location: http://localhost/Projeto_tcc/chamarTelas/telaCadastro')
            
        }else{

            // se o cpf não esta cadastrado ele passa e Aqui verifica se o EMAIL ja esta cadastrado

            $sql = $this->db->prepare("SELECT * from usuario where email=?");
            $sql->execute(array($email));
            $row = $sql->rowCount();

            if($row > 0){

                echo "<SCRIPT>
                alert('O email ".$email." ja existe!');
                location.href='http://localhost/Projeto_tcc/chamarTelas/telaCadastro';
                </SCRIPT>";


            }else{

                // se nenhum dos dois esta cadastrado ele insere os dados no banco

                $sql = $this->db->prepare("INSERT INTO usuario SET nome = ?, email = ?, senha = ?, cpf = ?, telefone = ?, titulo=?, tipo = ?, dataNasc= ?, rg= ?, sexo= ?");
                $sql->execute(array($nome,$email ,$senha, $cpf,$telefone,$titulo,$tipo,$dataNasc,$rg,$sexo));

                
                echo "<SCRIPT>
                alert('usuario".$nome." Cadstrado com sucesso');
                location.href='http://localhost/Projeto_tcc/chamarTelas/telaCadastro';
                </SCRIPT>";

            }

        }

    }


    // exibi todos os usuarios

    public function exibir(){

       // $sql = $this->db->prepare("SELECT * from usuario ORDER BY tipo desc");

        $sql = $this->db->prepare("SELECT * from usuario ORDER BY nome asc");

        $sql->execute();


        $row = $sql->rowCount();

        $array = $sql->fetchall();

        $this->setRows($array);


    }


    public function deletar($cpf){

       $sql = $this->db->prepare("DELETE from usuario WHERE cpf= ?");

       $sql->execute(array($cpf));


   }



   public function SelectEditar($cpf_del){

    if($cpf_del != 'alt'){

        $sql = $this->db->prepare("SELECT * from usuario  where cpf = ?");

        $sql->execute(array($cpf_del));


        $row = $sql->rowCount();

        if($row > 0){

            $array = $sql->fetch();

            $this->setRows($array);
        }


    }

}


public function editar($nome,$email, $cpf,$telefone,$titulo,$tipo,$dataNasc,$rg,$sexo,$cpf2){

    $sql = $this->db->prepare("UPDATE usuario SET cpf= ?, nome= ?, email= ?,  telefone= ?, titulo=?, tipo= ?, dataNasc= ?, rg= ?, sexo= ? WHERE cpf= ?");

    $sql->execute(array($cpf,$nome,$email,$telefone,$titulo,$tipo,$dataNasc,$rg,$sexo,$cpf2));




    
    echo "<SCRIPT>
    alert('Usuario <b>".$nome."</b> alterado com sucesso');
     </SCRIPT>";
   // 
   

}

// metodos Get's-------------------------------------------------------------------------------------------------
function getTitulo(){

    return $this->titulo;
}   

function getRows(){

    return $this->rows;
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
function setTitulo($titulo) {
    $this->titulo = $titulo;
}

function setRows($rows) {
    $this->rows = $rows;
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