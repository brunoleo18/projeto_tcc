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
	
}
.tab{
	font-size: 11px; 
	text-align: : center;	
}
#tr{
	text-transform: capitalize;
	background-color: #A9A9A9;
	text-align:  center;
}
h2 {

	text-align:  center;
	color: #4169E1;
	text-transform: capitalize;
}

#img1{

	width: 50px;
	height: 50px;
}

	</style>
</head>
<body>

 <a href="<?php echo BASE_URL;?>chamarTelas/voltar"><input type="button" name="" value="voltar"></a><br><br>
<div class="divTab">

	<h2 >Lista De usuarios cadastrados</h2>

<table class="tab" border="1" >
	
	<b><tr id="tr">
		
		<td>CPF</td>
		<td>nome</td>
		<td>email</td>
		<td>telefone</td>
		<td>tipo</td>
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
		<td>".$exibir['nome']."</td>
		<td>".$exibir['email']."</td>
		<td>".$exibir['telefone']."</td>
		<td>".$exibir['tipo']."</td>
		<td>".$exibir['dataNasc']."</td>
		<td>".$exibir['rg']."</td>
		<td>".$exibir['sexo']."</td>
		<td>Rua: ".$exibir['11'].", Nº: ".$exibir['12'].", Bairro: " .$exibir['13'].", Cidade: ".$exibir['14'].", UF: ".$exibir['15'].",CEP: ".$exibir['16'].", Complemento: ".$exibir['17']." </td>";

		echo "<td> <a href='http://localhost/Projeto_tcc/usuario/editar/".$exibir['cpf']."'><img id='img1' src='http://localhost/Projeto_tcc/assets/image/editar.png'></a>ou<a href='http://localhost/Projeto_tcc/usuario/excluir/".$exibir['cpf']."'><img id='img1' src='http://localhost/Projeto_tcc/assets/image/excluir.png'></a></td>";
	


	}

 ?>

 </table>
</div>
 </body>
</html>