<?php
if(isset($_SESSION['nome']) && !empty($_SESSION['nome'])){

	?>
	<!DOCTYPE html>
	<html>
	<head>

	</script>  
	<meta charset="utf-8">
	<title>Cadastro de Usuario</title>
	<style type="text/css">

	input, select{
		padding: 10px;
		border-radius: 5px;
	}

	.div_user{
		background-color: #FFF68F;
		padding: 10px;
	}

	label{

		font-size: 25px;
	}


</style>
</head>

<body style="background-color: #E0FFFF;">
	
	<div class="div_user">

		<a href="<?php echo BASE_URL;?>chamarTelas/voltar"><input type="button" name="" value="voltar"></a>

		<form action="<?php echo BASE_URL;?>reserva/inserir" method="POST" >

			<fieldset >

				<legend style="font-size: 30px;">Cadastro de Reserva</legend>

				<table >

					<tr>
						<td><label>CPF:</label></td>
						<td><input type="CPF" name="cpf" placeholder="000.000.000-00" size="14" required autocomplete="off"></td>


						<tr>
							<td><label>Nome:</label></td>
							<td><input type="text" name="nome" size="50" placeholder="Nome Completo" required "></td>
						</tr>

						<tr>
							<td><label>Veiculo:</label></td>
							<td><select name="veiculo" required="">
								<option>Selecionar</option>		

								<?php

							//require_once "core/model.php";

							//$md = new model;

								global $db;

								$sql = $db->prepare("SELECT * FROM Veiculo");

								$sql->execute();


								$dados = $sql->fetchall();


								foreach ($dados as $exibir) {

									echo "<option value=".$exibir['id'].">".$exibir['modelo']." ".$exibir['placa']."</option>";

									# code...
								}		

								?>							

							</select></td>

							<tr>

								<td><label>data inicio:</label></td>
									<td><input type="date" name="data_ini"></td>
								</tr>


								<tr>
									<td><label>data final  : </label></td>
										<td><input type="date" name="data_Fim"></td>

									</tr>			

									<tr><td><label>Status:</label></td>
										<td><select name="status" required="">
											<option>seleciona</option>
											<option value="aberta">aberta</option>
											<option value="andamento">Andamento</option>
											<option value="finalizada">Finalizada</option>
										</select></td>

									</tr> 

									

								</table>


								<tr><td><input type="submit" name="enviar" value="Cadastrar_Reserva" ></td>
									<td></td>
								</tr>

							</table>



						</fieldset>



					</form>



				</div>

			</body>
			</html>



			<?php
		}

		?>