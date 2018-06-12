<?php
if(isset($_SESSION['nome']) && !empty($_SESSION['nome'])){

?>

<!DOCTYPE html>
<html>
<head>
	<title>lista de veiculos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/telas.css"">
	
</head>
<body>

 <a href="<?php echo BASE_URL;?>chamarTelas/voltar"><input type="button" name="" value="voltar"></a><br><br>
<div class="divTab">

	<h2 >Lista De Veiculos cadastrados</h2>

<table class="tabV" s >


	
	<b><tr id="tr">
		
		<td>id</td>
		<td>placa</td>
		<td>modelo</td>
		<td>marca</td>
		<td>ano<br>fabricação</td>
		<td>combustivel</td>
		<td>valor diaria</td>
		<td>KM inicial</td>
		<td>Km final</td>
		<td>chassis</td>
		<td>documento</td>
		<td>Ações</td>
	</tr></b>

 <?php 

//var_dump($dados);



foreach ($dados as $exibir) {

	
	echo "<tr>
		<td>".$exibir['0']."</td>
		<td id='nome'>".$exibir['1']."</td>
		<td>".$exibir['2']."</td>
		<td>".$exibir['3']."</td>
		<td>".$exibir['4']."</td>
		<td>".$exibir['5']."</td>
		<td>R$ ".$exibir['6']."</td>
		<td>".$exibir['7']."</td>
		<td>".$exibir['8']."</td>
		<td>".$exibir['9']."</td>
		<td>".$exibir['10']."</td>";

		echo "<td> <a title='Editar' href='http://localhost/Projeto_tcc/veiculo/editar/".$exibir['id']."'><img id='img1' src='http://localhost/Projeto_tcc/assets/image/editar.png'></a>ou<a title='Excluir' href='http://localhost/Projeto_tcc/veiculo/excluir/".$exibir['id']."'><img id='img1' src='http://localhost/Projeto_tcc/assets/image/excluir.png'></a></td>";
	


	}

 ?>


 </table >
</div>
 </body>
</html>

<?php
}



	?>