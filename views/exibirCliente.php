<?php
if(isset($_SESSION['nome']) && !empty($_SESSION['nome'])){

	?>

<!DOCTYPE html>
<html>
<head>
	<title>lista de clientes</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/telas.css"">
	
</head>
<body>

 <a href="<?php echo BASE_URL;?>chamarTelas/voltar"><input type="button" name="" value="voltar"></a><br><br>
<div class="divTab">

	<h2 >Lista De Clientes cadastrados</h2>

<table class="tab" border="1" >
	
	<b><tr id="tr">
		
		<td>CPF</td>
		<td>nome</td>
		<td>email</td>
		<td>telefone</td>
		<td>cnh</td>
		<td>categoria</td>
		<td>profissão</td>
		<td>data nascimento</td>
		<td>RG</td>
		<td>Sexo</td>
		<td>endereco</td>
		<td>ações</td>
	</tr></b>

 <?php 

//var_dump($dados);



foreach ($dados as $exibir) {

	

	
	echo "<tr>
		<td>".$exibir['cpf']."</td>
		<td id='nome'>".$exibir['nome']."</td>
		<td>".$exibir['email']."</td>
		<td>".$exibir['telefone']."</td>
		<td>".$exibir['cnh']."</td>
		<td>".$exibir['categoria']."</td>
		<td>".$exibir['profissao']."</td>
		<td>".$exibir['data_nasc']."</td>
		<td>".$exibir['rg']."</td>
		<td>".$exibir['sexo']."</td>
		<td>Rua: ".$exibir['rua'].", Nº: ".$exibir['num'].",<br> Bairro: " .$exibir['bairro'].",<br> Cidade: ".$exibir['cidade'].", UF: ".$exibir['estado'].",CEP: ".$exibir['cep'].", <br>Complemento: ".$exibir['complemento']." </td>";

		echo "<td> <a title='Editar' href='http://localhost/Projeto_tcc/cliente/editar/".$exibir['cpf']."'><img id='img1' src='http://localhost/Projeto_tcc/assets/image/editar.png'></a>ou<a title='Excluir' href='http://localhost/Projeto_tcc/cliente/excluir/".$exibir['cpf']."'><img id='img1' src='http://localhost/Projeto_tcc/assets/image/excluir.png'></a></td>";
	


	}

 ?>


 </table >
</div>
 </body>
</html>

<?php
}



	?>