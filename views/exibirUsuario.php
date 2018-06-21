<?php
if(isset($_SESSION['nome']) && !empty($_SESSION['nome'])){

	?>

<!DOCTYPE html>
<html>
<head>
	<title>lista de usuarios</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/telas.css"">
	
</head>
<body>

 <a href="<?php echo BASE_URL;?>chamarTelas/voltar"><input type="button" name="" value="voltar"></a><br><br>
<div class="divTab">

	<h2 >Lista De usuarios cadastrados</h2>

<table class="tab" border="1" style="font-size: 20px; border-collapse: collapse;" >
	
	<b><tr id="tr">
		
		<td>CPF</td>
		<td>nome</td>
		<td>email</td>
		<td>telefone</td>
		<td>titulo</td>
		<td>tipo</td>
		<td>data nascimento</td>
		<td>RG</td>
		<td>Sexo</td>
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
		<td>".$exibir['titulo']."</td>
		<td>".$exibir['tipo']."</td>
		<td>".$exibir['dataNasc']."</td>
		<td>".$exibir['rg']."</td>
		<td>".$exibir['sexo']."</td>";

		echo "<td> <a title='Editar' href='http://localhost/Projeto_tcc/usuario/editar/".$exibir['cpf']."'><img id='img1' src='http://localhost/Projeto_tcc/assets/image/editar.png'></a>ou<a title='Excluir' href='http://localhost/Projeto_tcc/usuario/excluir/".$exibir['cpf']."'><img id='img1' src='http://localhost/Projeto_tcc/assets/image/excluir.png'></a></td>";
	


	}

 ?>


 </table >
</div>
 </body>
</html>

<?php
}



	?>