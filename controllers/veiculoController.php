<?php


class veiculoController extends controller{



	public function index(){



	}

	public function cadastrar(){

		$veic = new veiculo;

$veic->setPlaca(addslashes($_POST['placa']));
$veic->setMarca(addslashes($_POST['marca']));
$veic->setModelo(addslashes($_POST['modelo']));
$veic->setAno_fabr(addslashes($_POST['ano']));
$veic->setCombustivel(addslashes($_POST['combustivel']));
$veic->setValor_diaria(addslashes($_POST['vDiaria']));
$veic->setKm_inicial(addslashes($_POST['km_inicial']));
$veic->setKm_atual(addslashes($_POST['km_atual']));
$veic->setChassis(addslashes($_POST['chassis']));
$veic->setDocumento(addslashes($_POST['documento']));

$placa = $veic->getPlaca();
$marca = $veic->getMarca();
$modelo =$veic->getModelo();
$ano_fabr = $veic->getAno_fabr();
$combustivel = $veic->getCombustivel();
$valor_diaria = $veic->getValor_diaria();
$km_inicial =$veic->getKm_inicial();
$km_atual = $veic->getKm_atual();
$chassis = $veic->getChassis();
$documento = $veic->getDocumento();

$veic->inserir($placa,$modelo,$marca,$ano_fabr,$combustivel,$valor_diaria,$km_inicial,$Km_atual,$chassis,$documento); 



		 echo "<SCRIPT>
                alert('cadastrado');
                location.href='http://localhost/Projeto_tcc/chamarTelas/telaCadastro';
                </SCRIPT>";


	}
}



?>