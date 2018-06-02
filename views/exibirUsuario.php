<!DOCTYPE html>
<html>
<head>
	<title>lista de usuarios</title>
	<meta charset="utf-8">
	<style type="text/css">
		
body{
	background-color: #40E0D0;
}


.divTab{

	background-color: white;
	padding: 10px;
	padding-left: 50px;
}
.tab{
	font-size: 20px; 
	text-orientation: center;

	
}
#tr{
	text-transform: capitalize;
	background-color: #A9A9A9;
	text-orientation: center;

}

	</style>
</head>
<body>

 <a href="<?php echo BASE_URL;?>chamarTelas/voltar"><input type="button" name="" value="voltar"></a><br><br>
<div class="divTab">

<table class="tab" border="1" >
	
	<b><tr id="tr">
		<td>id</td>
		<td>nome</td>
		<td>CPF</td>
		<td>email</td>
		<td>telefone</td>
		<td>tipo</td>
		<td>data nascimento</td>
		<td>RG</td>
		<td>Sexo</td>
		<td>endereco</td>
	</tr></b>

 <?php 

//var_dump($dados);



foreach ($dados as $exibir) {


	echo "<tr>
		<td>".$exibir['id']."</td>
		<td>".$exibir['nome']."</td>
		<td>".$exibir['cpf']."</td>
		<td>".$exibir['email']."</td>
		<td>".$exibir['telefone']."</td>
		<td>".$exibir['tipo']."</td>
		<td>".$exibir['dataNasc']."</td>
		<td>".$exibir['rg']."</td>
		<td>".$exibir['sexo']."</td>
		<td>".$exibir['10']."</td>
	</tr>";
	# code...
}

 ?>

 </table>
</div>
 </body>
</html>