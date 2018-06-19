<?php


class oficinaController extends controller{



	public function index(){
  

  var_dump($_POST);

	}

		

	public function inserirOficina(){		

		$oficina = new Oficina;
		$end= new Endereco;

		var_dump($_POST);

		
		$oficina->setNome_fantasia(addslashes($_POST['nome_fantasia']));
		$oficina->setCnpj(addslashes($_POST['cnpj']));
		$oficina->setRazao_social(addslashes($_POST['razao_social']));
		$oficina->setFundacao(addslashes($_POST['data']));
		$oficina->setSegmento(addslashes($_POST['segmento']));		
		$oficina->setInscricao_social(addslashes($_POST['inscricao']));
		$oficina->setEmail(addslashes($_POST['email']));
		$oficina->setTelefone(addslashes($_POST['telefone']));		
		$oficina->setEndereco($end);



		$nome_fantasia = $oficina->getNome_fantasia();
		$cnpj = $oficina->getCnpj();		
		$razao_social = $oficina->getRazao_social();		
		$fundacao = $oficina->getFundacao();
		$segmento = $oficina->getSegmento();
		$inscricao_social = $oficina->getInscricao_social();
		$email = $oficina->getEmail();
        $telefone =$oficina->getTelefone();
					

		$oficina->getEndereco()->setRua(addslashes($_POST['rua']));
		$oficina->getEndereco()->setNum(addslashes($_POST['num']));
		$oficina->getEndereco()->setBairro(addslashes($_POST['bairro']));
		$oficina->getEndereco()->setCidade(addslashes($_POST['cidade']));
		$oficina->getEndereco()->setCep(addslashes($_POST['cep']));
		$oficina->getEndereco()->setEstado(addslashes($_POST['estado']));
		$oficina->getEndereco()->setComplemento(addslashes($_POST['complemento']));
		$oficina->getEndereco()->setId_cpf(addslashes($_POST['cnpj']));		

		$rua = $oficina->getEndereco()->getRua();
		$num = $oficina->getEndereco()->getNum();
		$bairro = $oficina->getEndereco()->getBairro();
		$cidade = $oficina->getEndereco()->getCidade();
		$cep = $oficina->getEndereco()->getCep();
		$estado = $oficina->getEndereco()->getEstado();
		$complemento = $oficina->getEndereco()->getComplemento();
		$id_cpf = $oficina->getEndereco()->getId_cpf();

		

		$oficina->insert($cnpj,$razao_social, $nome_fantasia ,$fundacao,$inscricao_social, $segmento,$email,$telefone);


		     // $this->loadTemplete('cadastrooficina');

	}


	public function mostrar(){

		$oficina = new Oficina;

		$oficina->exibir();

		$dados = array('dados' => $oficina->getRows());


		$this->loadTemplete('exibirOficina',$dados);
	}


	public function editar($cnpj){

		if($cnpj != "alt"){

			$oficina = new oficina;

			$oficina->selectEditar($cnpj);

			$dados = array('dados' => $oficina->getRows());



			$this->loadTemplete('editarOficina',$dados);



		}else if ($cnpj == "alt"){



						
			$oficina = new oficina;
			$end= new Endereco;


		$oficina->setNome_fantasia(addslashes($_POST['nome_fantasia']));
		$oficina->setCnpj(addslashes($_POST['cnpj']));
		$oficina->setRazao_social(addslashes($_POST['razao_social']));
		$oficina->setFundacao(addslashes($_POST['data']));
		$oficina->setSegmento(addslashes($_POST['segmento']));		
		$oficina->setInscricao_social(addslashes($_POST['inscricao']));
		$oficina->setEmail(addslashes($_POST['email']));
		$oficina->setTelefone(addslashes($_POST['telefone']));		
		$oficina->setEndereco($end);



		$nome_fantasia = $oficina->getNome_fantasia();
		$cnpj = $oficina->getCnpj();		
		$razao_social = $oficina->getRazao_social();		
		$fundacao = $oficina->getFundacao();
		$segmento = $oficina->getSegmento();
		$inscricao_social = $oficina->getInscricao_social();
		$email = $oficina->getEmail();
        $telefone =$oficina->getTelefone();


	    

			$oficina->getEndereco()->setRua(addslashes($_POST['rua']));
			$oficina->getEndereco()->setNum(addslashes($_POST['num']));
			$oficina->getEndereco()->setBairro(addslashes($_POST['bairro']));
			$oficina->getEndereco()->setCidade(addslashes($_POST['cidade']));
			$oficina->getEndereco()->setCep(addslashes($_POST['cep']));
			$oficina->getEndereco()->setEstado(addslashes($_POST['estado']));
			$oficina->getEndereco()->setComplemento(addslashes($_POST['complemento']));
			$oficina->getEndereco()->setId_cpf(addslashes($_POST['cnpj']));		

			$rua = $oficina->getEndereco()->getRua();
			$num = $oficina->getEndereco()->getNum();
			$bairro = $oficina->getEndereco()->getBairro();
			$cidade = $oficina->getEndereco()->getCidade();
			$cep = $oficina->getEndereco()->getCep();
			$estado = $oficina->getEndereco()->getEstado();
			$complemento = $oficina->getEndereco()->getComplemento();






			$oficina->editar($cnpj,$razao_social, $nome_fantasia ,$fundacao,$inscricao_social, $segmento,$email,$telefone);



			header('location: http://localhost/Projeto_tcc/oficina/mostrar');			



		}


		
	}

	public function excluir($cnpj){		

		$oficina = new oficina;

		$oficina->deletar($cnpj);

		header('location: http://localhost/Projeto_tcc/oficina/mostrar');
		
	}


	public function retornaNome(){

		$da = $_POST['cpf'];

		$cli = new oficina;

		$cli->nome($da);

		$v =  $cli->getRows();


	    echo $v;


	}




}


?>