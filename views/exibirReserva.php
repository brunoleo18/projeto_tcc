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
 <a href="<?php echo BASE_URL;?>reserva/mostrar/aberta"><input type="button" name="" value="Exibir Reservas abertas"></a>
 <a href="<?php echo BASE_URL;?>reserva/mostrar/andamento"><input type="button" name="" value="Exibir Reservas em andamento"></a>
 <a href="<?php echo BASE_URL;?>reserva/mostrar/finalizada"><input type="button" name="" value="Exibir Reservas em finalizada"></a>
 
  <br>
<div class="divTab">

	<h2 >Lista De Reservas</h2>

<table class="tab2" border="1"  >
	
	<b><tr id="tr">
		
		<td>id reserva</td>
		<td>cpf cliente</td>
		<td>Nome</td>
		<td>carro</td>
		<td>placa</td>
		<td>data inicio<br> da reserva</td>
		<td>data <br>chegada</td>
		<td>status</td>
		<td>hora saida</td>
		<td>km saida</td>
		<td>hora chegada</td>
		<td>km chegada</td>
		<td>km rodados</td>
		<td>ações</td>
	</tr></b>

 <?php 

//var_dump($dados);

if(empty($dados)){

echo "<tr><td><h1>NÃO HÁ RESERVAS!</h1></td></tr>";
}else{

foreach ($dados as $exibir) {



	
	echo "<tr>
		<td>".$exibir['id_reserva']."</td>
		<td id='nome'>".$exibir['id_cliente']."</td>
		<td>".$exibir['nome']."</td>
		<td>".$exibir['modelo']."</td>
		<td>".$exibir['placa']."</td>
		<td>".$exibir['data_inicio']."</td>
		<td>".$exibir['data_fim']."</td>
		<td>".$exibir['status']."</td>
		<td>".$exibir['hora_saida']."</td>
		<td>".$exibir['km_saida']."</td>
		<td>".$exibir['hora_chegada']."</td>
		<td>".$exibir['km_chegada']."</td>
		<td>".$exibir['km_rodados']."</td>
		
		";

		echo "<td> <a title='Editar' href='http://localhost/Projeto_tcc/reserva/editar/".$exibir['id_reserva']."'><img id='img1' src='http://localhost/Projeto_tcc/assets/image/editar.png'></a>";

		if($exibir['status'] != 'andamento' && $exibir['status'] != 'finalizada'){

			echo "<a title='Excluir' href='http://localhost/Projeto_tcc/usuario/excluir/".$exibir['id_reserva']."'><img id='img1' src='http://localhost/Projeto_tcc/assets/image/excluir.png'></a></td>";
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