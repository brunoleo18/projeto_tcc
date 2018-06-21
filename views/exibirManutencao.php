<?php
if(isset($_SESSION['nome']) && !empty($_SESSION['nome'])){

	//var_dump($dados);

	?>

<!DOCTYPE html>
<html>
<head>
	<title>lista de usuarios</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/telas.css">
	
</head>
<body>

 <a href="<?php echo BASE_URL;?>chamarTelas/voltar"><input type="button" name="" value="voltar"></a><br><br>
 <a href="<?php echo BASE_URL;?>manutencao/mostrar/aberta"><input type="button" name="" value="Exibir Manutenções abertas"></a>
 
 <a href="<?php echo BASE_URL;?>manutencao/mostrar/fechada"><input type="button" name="" value="Exibir Manutenções Finalizadas"></a>
 
  <br>
<div class="divTab">

	<h2 >Lista De manutenção</h2>

<table class="tab2" border="1" style="border-collapse: collapse;" >
	
	<b><tr id="tr">
		
		<td>id manutençao</td>
		<td>data de ida:</td>
		<td>veiculo placa</td>
		<td>Oficina</td>
		<td>km</td>
		<td>status</td>
		<td>tipo</td>
		<td>serviço</td>
		<td>descriçaõ</td>
		<td>valor</td>
		<td>data retorno</td>
		<td>Ações</td>
		</tr></b>

 <?php 

//var_dump($dados);

if(empty($dados)){

echo "<tr><td><h1>NÃO HÁ MANUTENÇÃO EM ABERTO!</h1></td></tr>";
}else{

foreach ($dados as $exibir) {



	
	echo "<tr>
		<td>".$exibir['0']."</td>
		<td>".$exibir['1']."</td>
		<td id='nome'>".$exibir['modelo']."-- ".$exibir['placa']."</td>
		<td>".$exibir['nome_fantasia']."</td>
		<td>".$exibir['km']."</td>
		<td>".$exibir['status']."</td>
		<td>".$exibir['tipo']."</td>
		<td>".$exibir['servico']."</td>
		<td>".$exibir['descricao']."</td>
		<td>R$ ".$exibir['valor']."</td>
		<td>".$exibir['data_retorno']."</td>";

		echo "<td> <a title='Editar' href='http://localhost/Projeto_tcc/manutencao/editar/".$exibir['0']."'><img id='img1' src='http://localhost/Projeto_tcc/assets/image/editar.png'></a>";

		if($exibir['status'] != 'fechada'){

			echo "<a title='Excluir' href='http://localhost/Projeto_tcc/manutencao/excluir/".$exibir['0']."'><img id='img1' src='http://localhost/Projeto_tcc/assets/image/excluir.png'></a></td>";
		}
	

}
	}

 
?>

 </table >
 
</div>
 </body>
</html>
	
<?php
}



	?>