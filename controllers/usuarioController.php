<?php


class usuarioController extends controller{



	public function index(){

		

		$user = new Usuario;

		$email =addslashes($_POST['email']);
		$senha = addslashes(md5($_POST['senha']));

		$user->logar($email,$senha);

		$tipo = $user->getTipo();

		switch ($tipo) {

			case 0:
			$this->loadTemplete('telaUsuario');			

			break;

			case 1:

			$this->loadTemplete('usuarioAdmin');

			break;

			case 2:

			echo "<SCRIPT>
			alert('Usuario e/ou senha invalidos, tente novamente!');
			location.href='http://localhost/Projeto_tcc/';
			</SCRIPT>";

			break;			

		}

		
	}


	public function inserirUser(){		

		$usuario = new Usuario;
		$end= new Endereco;

		
		$usuario->setNome(addslashes($_POST['nome']));
		$usuario->setCpf(addslashes($_POST['cpf']));
		$usuario->setRg(addslashes($_POST['rg']));
		$usuario->setEmail(addslashes($_POST['email']));
		$usuario->setSexo(addslashes($_POST['sexo']));		
		$usuario->setDataNasc(addslashes($_POST['data']));
		$usuario->setTipo(addslashes($_POST['tipo']));		
		$usuario->setTelefone(addslashes($_POST['telefone']));		
		$usuario->setSenha(addslashes(md5($_POST['senha'])));

		$usuario->setEndereco($end);



		$nome = $usuario->getNome();
		$cpf = $usuario->getCpf();		
		$rg = $usuario->getRg();		
		$email = $usuario->getEmail();
		$sexo = $usuario->getSexo();
		$dataNasc = $usuario->getDataNasc();
		$tipo = $usuario->getTipo();
		$telefone = $usuario->getTelefone();
		$senha = $usuario->getSenha(); 	

		$usuario->getEndereco()->setRua(addslashes($_POST['rua']));
		$usuario->getEndereco()->setNum(addslashes($_POST['num']));
		$usuario->getEndereco()->setBairro(addslashes($_POST['bairro']));
		$usuario->getEndereco()->setCidade(addslashes($_POST['cidade']));
		$usuario->getEndereco()->setCep(addslashes($_POST['cep']));
		$usuario->getEndereco()->setEstado(addslashes($_POST['estado']));
		$usuario->getEndereco()->setComplemento(addslashes($_POST['complemento']));
		$usuario->getEndereco()->setId_cpf(addslashes($_POST['cpf']));		

		$rua = $usuario->getEndereco()->getRua();
		$num = $usuario->getEndereco()->getNum();
		$bairro = $usuario->getEndereco()->getBairro();
		$cidade = $usuario->getEndereco()->getCidade();
		$cep = $usuario->getEndereco()->getCep();
		$estado = $usuario->getEndereco()->getEstado();
		$complemento = $usuario->getEndereco()->getComplemento();
		$id_cpf = $usuario->getEndereco()->getId_cpf();

		

		$usuario->insertUser($nome,$email ,$senha, $cpf,$telefone,$tipo,$dataNasc,$rg,$sexo);


		     // $this->loadTemplete('cadastroUsuario');

	}


	public function mostrar(){

		$usuario = new Usuario;

		$usuario->exibir();

		$dados = array('dados' => $usuario->getRows());




		$this->loadTemplete('exibirUsuario',$dados);
	}


	public function editar($cpf_del){

		if($cpf_del != "alt"){

			$usuario = new Usuario;

			$usuario->selectEditar($cpf_del);

			$dados = array('dados' => $usuario->getRows());



			$this->loadTemplete('editarUsuario',$dados);



		}else if ($cpf_del == "alt"){



			$cpf2 = addslashes($_POST['cpfAntigo']); 
			
			$usuario = new Usuario;
			$end= new Endereco;


			$usuario->setNome(addslashes($_POST['nome']));
			$usuario->setCpf(addslashes($_POST['cpf']));
			$usuario->setRg(addslashes($_POST['rg']));
			$usuario->setEmail(addslashes($_POST['email']));
			$usuario->setSexo(addslashes($_POST['sexo']));		
			$usuario->setDataNasc(addslashes($_POST['data']));
			$usuario->setTipo(addslashes($_POST['tipo']));		
			$usuario->setTelefone(addslashes($_POST['telefone']));		
			$usuario->setEndereco($end);

			$nome = $usuario->getNome();
			$cpf = $usuario->getCpf();		
			$rg = $usuario->getRg();		
			$email = $usuario->getEmail();
			$sexo = $usuario->getSexo();
			$dataNasc = $usuario->getDataNasc();
			$tipo = $usuario->getTipo();
			$telefone = $usuario->getTelefone();
			$senha = $usuario->getSenha(); 	

			$usuario->getEndereco()->setRua(addslashes($_POST['rua']));
			$usuario->getEndereco()->setNum(addslashes($_POST['num']));
			$usuario->getEndereco()->setBairro(addslashes($_POST['bairro']));
			$usuario->getEndereco()->setCidade(addslashes($_POST['cidade']));
			$usuario->getEndereco()->setCep(addslashes($_POST['cep']));
			$usuario->getEndereco()->setEstado(addslashes($_POST['estado']));
			$usuario->getEndereco()->setComplemento(addslashes($_POST['complemento']));
			$usuario->getEndereco()->setId_cpf(addslashes($_POST['cpf']));		

			$rua = $usuario->getEndereco()->getRua();
			$num = $usuario->getEndereco()->getNum();
			$bairro = $usuario->getEndereco()->getBairro();
			$cidade = $usuario->getEndereco()->getCidade();
			$cep = $usuario->getEndereco()->getCep();
			$estado = $usuario->getEndereco()->getEstado();
			$complemento = $usuario->getEndereco()->getComplemento();






			$usuario->editar($nome,$email,$cpf,$telefone,$tipo,$dataNasc,$rg,$sexo,$cpf2);



			header('location: http://localhost/Projeto_tcc/usuario/mostrar');			



		}


		
	}

	public function excluir($cpf){		

		$usuario = new Usuario;

		$usuario->deletar($cpf);

		header('location: http://localhost/Projeto_tcc/usuario/mostrar');

	}



}


?>