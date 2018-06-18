<?php


class clienteController extends controller{



	public function index(){
  

  var_dump($_POST);

	}

		

		

	public function inserirCliente(){		

		$cliente = new Cliente;
		$end= new Endereco;

		
		$cliente->setNome(addslashes($_POST['nome']));
		$cliente->setCpf(addslashes($_POST['cpf']));
		$cliente->setRg(addslashes($_POST['rg']));
		$cliente->setEmail(addslashes($_POST['email']));
		$cliente->setSexo(addslashes($_POST['sexo']));		
		$cliente->setDataNasc(addslashes($_POST['data']));
		$cliente->setCnh(addslashes($_POST['cnh']));
		$cliente->setCategoria(addslashes($_POST['categoria']));		
		$cliente->setTelefone(addslashes($_POST['telefone']));		
		$cliente->setProfissao(addslashes($_POST['profissao']));

		$cliente->setEndereco($end);



		$nome = $cliente->getNome();
		$cpf = $cliente->getCpf();		
		$rg = $cliente->getRg();		
		$email = $cliente->getEmail();
		$sexo = $cliente->getSexo();
		$dataNasc = $cliente->getDataNasc();
		$cnh = $cliente->getCnh();
        $profissao =$cliente->getProfissao();
		$categoria = $cliente->getCategoria();
		$telefone = $cliente->getTelefone();
			

		$cliente->getEndereco()->setRua(addslashes($_POST['rua']));
		$cliente->getEndereco()->setNum(addslashes($_POST['num']));
		$cliente->getEndereco()->setBairro(addslashes($_POST['bairro']));
		$cliente->getEndereco()->setCidade(addslashes($_POST['cidade']));
		$cliente->getEndereco()->setCep(addslashes($_POST['cep']));
		$cliente->getEndereco()->setEstado(addslashes($_POST['estado']));
		$cliente->getEndereco()->setComplemento(addslashes($_POST['complemento']));
		$cliente->getEndereco()->setId_cpf(addslashes($_POST['cpf']));		

		$rua = $cliente->getEndereco()->getRua();
		$num = $cliente->getEndereco()->getNum();
		$bairro = $cliente->getEndereco()->getBairro();
		$cidade = $cliente->getEndereco()->getCidade();
		$cep = $cliente->getEndereco()->getCep();
		$estado = $cliente->getEndereco()->getEstado();
		$complemento = $cliente->getEndereco()->getComplemento();
		$id_cpf = $cliente->getEndereco()->getId_cpf();

		

		$cliente->insert($nome,$email,$cnh,$categoria, $profissao,$cpf,$telefone,$dataNasc,$rg,$sexo);


		     // $this->loadTemplete('cadastrocliente');

	}


	public function mostrar(){

		$cliente = new cliente;

		$cliente->exibir();

		$dados = array('dados' => $cliente->getRows());




		$this->loadTemplete('exibirCliente',$dados);
	}


	public function editar($cpf_del){

		if($cpf_del != "alt"){

			$cliente = new cliente;

			$cliente->selectEditar($cpf_del);

			$dados = array('dados' => $cliente->getRows());



			$this->loadTemplete('editarcliente',$dados);



		}else if ($cpf_del == "alt"){



			$cpf2 = addslashes($_POST['cpfAntigo']); 
			
			$cliente = new cliente;
			$end= new Endereco;


	    $cliente->setNome(addslashes($_POST['nome']));
		$cliente->setCpf(addslashes($_POST['cpf']));
		$cliente->setRg(addslashes($_POST['rg']));
		$cliente->setEmail(addslashes($_POST['email']));
		$cliente->setSexo(addslashes($_POST['sexo']));		
		$cliente->setDataNasc(addslashes($_POST['data']));
		$cliente->setCnh(addslashes($_POST['cnh']));
		$cliente->setCategoria(addslashes($_POST['categoria']));		
		$cliente->setTelefone(addslashes($_POST['telefone']));		
		$cliente->setProfissao(addslashes($_POST['profissao']));

		$cliente->setEndereco($end);



		$nome = $cliente->getNome();
		$cpf = $cliente->getCpf();		
		$rg = $cliente->getRg();		
		$email = $cliente->getEmail();
		$sexo = $cliente->getSexo();
		$dataNasc = $cliente->getDataNasc();
		$cnh = $cliente->getCnh();
        $profissao =$cliente->getProfissao();
		$categoria = $cliente->getCategoria();
		$telefone = $cliente->getTelefone();
			


			$cliente->getEndereco()->setRua(addslashes($_POST['rua']));
			$cliente->getEndereco()->setNum(addslashes($_POST['num']));
			$cliente->getEndereco()->setBairro(addslashes($_POST['bairro']));
			$cliente->getEndereco()->setCidade(addslashes($_POST['cidade']));
			$cliente->getEndereco()->setCep(addslashes($_POST['cep']));
			$cliente->getEndereco()->setEstado(addslashes($_POST['estado']));
			$cliente->getEndereco()->setComplemento(addslashes($_POST['complemento']));
			$cliente->getEndereco()->setId_cpf(addslashes($_POST['cpf']));		

			$rua = $cliente->getEndereco()->getRua();
			$num = $cliente->getEndereco()->getNum();
			$bairro = $cliente->getEndereco()->getBairro();
			$cidade = $cliente->getEndereco()->getCidade();
			$cep = $cliente->getEndereco()->getCep();
			$estado = $cliente->getEndereco()->getEstado();
			$complemento = $cliente->getEndereco()->getComplemento();






			$cliente->editar($nome,$email, $cnh ,$categoria,$profissao, $cpf,$telefone,$dataNasc,$rg,$sexo,$cpf2);



			header('location: http://localhost/Projeto_tcc/cliente/mostrar');			



		}


		
	}

	public function excluir($cpf){		

		$cliente = new cliente;

		$cliente->deletar($cpf);

		header('location: http://localhost/Projeto_tcc/cliente/mostrar');
		
	}


	public function retornaNome(){

		$da = $_POST['cpf'];

		$cli = new cliente;

		$cli->nome($da);

		$v =  $cli->getRows();


	    echo $v;


	}




}


?>