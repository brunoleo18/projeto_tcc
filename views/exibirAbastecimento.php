<?php
if(isset($_SESSION['nome']) && !empty($_SESSION['nome'])){

	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>lista de ABASTECIMENTO</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/telas.css">

	</head>
	<body>

		<a href="<?php echo BASE_URL;?>chamarTelas/voltar"><input type="button" name="" value="voltar"></a><br><br>
		<a href="<?php echo BASE_URL;?>abastecimento/mostrar"><input type="button" name="" value="Exibir todos"></a><br><br>


		<div style="width: 80%; height: 100px; background-color: white; padding: 3px;">

			<h3>Consulte gastos com abestecimento por periodo</h3>
			
			<form method="POST" action="<?php echo BASE_URL;?>abastecimento/mostrarTot" >

				<label>Veiculo:</label>
				<select name="veiculo">
					<option value="">Selecionar</option>
					<?php
					global $db;

					$sql = $db->prepare("SELECT * FROM Veiculo");
					$sql->execute();
					$dados = $sql->fetchall();

					foreach ($dados as $mostrar) {

						echo "<option value=".$mostrar['id'].">".$mostrar['modelo']." ".$mostrar['placa']."</option><br>";

					# code...
					}


					?>
				</select>

				<label>data inicio:</label>

				<input type="date" name="data_ini">

				<label>data fim:</label>

				<input type="date" name="data_fim">

				<input type="submit" name="enviar">
			</form>

		</div>


		<br>
		<div class="divTab" style="text-align: ;">


			<?php


			if(!empty($totale)){

//var_dump($totale);

				?>

				<h2 >ABASTECIMENTOS TOTAL POR PERIODO</h2>

				<table class="tab2" border="1" style="border-collapse: collapse; font-size: 25px;" >

					<b><tr id="tr">

						<td>id veiculo</td>
						<td>modelo</td>
						<td>placa</td>
						<td>combustivel</td>
						<td>total no periodo</td>
						
					</tr ></b>


					<?php
					foreach ($totale as $exibir) {



						echo "<tr>
						<td>".$exibir['0']."</td>
						<td>".$exibir['1']."</td>
						<td>".$exibir['2']."</td>
						<td>".$exibir['3']."</td>
						<td>".$exibir['4']."</td>
						

						";

					}

				}else{

					?>

					<h2 >ABASTECIMENTOS</h2>

					<table class="tab2" border="1" style="border-collapse: collapse; font-size: 25px;" >

						<b><tr id="tr">

							<td>id abast:</td>
							<td>Data</td>
							<td>veiculo</td>
							<td>placa</td>
							<td>km</td>
							<td>posto</td>
							<td>combustivel</td>
							<td>unidade</td>
							<td>quant</td>
							<td>valor Unit:</td>
							<td>total</td>
							<td>ações</td>
						</tr ></b>

						<?php 

//var_dump($dados);

						if(empty($info)){

							echo "<tr><td><h1>NÃO HÁ RESERVAS!</h1></td></tr>";
						}else{

							foreach ($info as $exibir) {

//var_dump($info);


								echo "<tr>
								<td>".$exibir['0']."</td>
								<td>".$exibir['data_abs']."</td>
								<td id='nome'>".$exibir['modelo']."</td>
								<td>".$exibir['placa']."</td>
								<td>".$exibir['km']."</td>
								<td>".$exibir['posto']."</td>
								<td>".$exibir['5']."</td>
								<td>".$exibir['unidade']."</td>
								<td>".$exibir['quant']."</td>
								<td>".$exibir['preco_unit']."</td>
								<td>".$exibir['total']."</td>

								";

								echo "<td> <a title='Editar' href='http://localhost/Projeto_tcc/abastecimento/editar/".$exibir['0']."'><img id='img1' src='http://localhost/Projeto_tcc/assets/image/editar.png'></a>";



								echo "<a title='Excluir' href='http://localhost/Projeto_tcc/abastecimento/excluir/".$exibir['0']."'><img id='img1' src='http://localhost/Projeto_tcc/assets/image/excluir.png'></a></td>";



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