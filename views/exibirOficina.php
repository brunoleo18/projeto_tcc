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

	<h2 >Lista De Oficinas cadastradas</h2>

<table class="tab" border="1" >
	
	<b><tr id="tr">
		
		<td>CNPJ</td>
		<td>RAZAO<br>SOCIAL</td>
		<td>NOME<br>FANTASIA</td>
		<td>FUNDACAO</td>
		<td>SEGMENTO</td>
		<td>INCRIÇÃO<br>SOCIAL</td>
		<td>EMAIL</td>
		<td>TELEFONE</td>
		<td>endereco</td>
		<td>ações</td>
	</tr></b>

 <?php 

//var_dump($dados);



foreach ($dados as $exibir) {

	

	
	echo "<tr>
		<td>".$exibir['cnpj']."</td>
		<td id='nome'>".$exibir['1']."</td>
		<td>".$exibir['2']."</td>
		<td>".$exibir['3']."</td>
		<td>".$exibir['5']."</td>
		<td>".$exibir['4']."</td>
		<td>".$exibir['6']."</td>
		<td>".$exibir['7']."</td>
		<td>Rua: ".$exibir['rua'].", Nº: ".$exibir['num'].",<br> Bairro: " .$exibir['bairro'].",<br> Cidade: ".$exibir['cidade'].", UF: ".$exibir['estado'].",CEP: ".$exibir['cep'].", <br>Complemento: ".$exibir['complemento']." </td>";

		echo "<td> <a title='Editar' href='http://localhost/Projeto_tcc/oficina/editar/".$exibir['cnpj']."'><img id='img1' src='http://localhost/Projeto_tcc/assets/image/editar.png'></a>ou<a title='Excluir' href='http://localhost/Projeto_tcc/oficina/excluir/".$exibir['cnpj']."'><img id='img1' src='http://localhost/Projeto_tcc/assets/image/excluir.png'></a></td>";
	


	}

 ?>


 </table >
</div>
 </body>
</html>

<?php
}



	?>