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

		$usuario->getEndereco()->setRua($_POST['rua']);
		$usuario->getEndereco()->setNum($_POST['num']);
		$usuario->getEndereco()->setBairro($_POST['bairro']);
		$usuario->getEndereco()->setCidade($_POST['cidade']);
		$usuario->getEndereco()->setCep($_POST['cep']);
		$usuario->getEndereco()->setEstado($_POST['estado']);
		$usuario->getEndereco()->setComplemento($_POST['complemento']);

		

		$rua = $usuario->getEndereco()->getRua();
		$num = $usuario->getEndereco()->getNum();
		$bairro = $usuario->getEndereco()->getBairro();
		$cidade = $usuario->getEndereco()->getCidade();
		$cep = $usuario->getEndereco()->getCep();
		$estado = $usuario->getEndereco()->getEstado();
		$complemento = $usuario->getEndereco()->getComplemento();

		$usuario->getEndereco()->inserirEnd($rua,$num,$bairro,$cidade,$estado,$cep,$complemento);


		$id_end = $usuario->getEndereco()->getIdEndereco();

		$usuario->insertUser($nome,$email ,$senha, $cpf,$telefone,$tipo,$dataNasc,$rg,$sexo, $id_end);

		header('location: http://localhost/Projeto_tcc/chamarTelas/telaCadastro');


	      // $this->loadTemplete('cadastroUsuario');

	}


	public function mostrar(){

		$usuario = new Usuario;

		$usuario->exibir();

		$dados = array('dados' => $usuario->getRows());




		$this->loadTemplete('exibirUsuario',$dados);
	}





}


?>