<?php
if(isset($_SESSION['nome']) && !empty($_SESSION['nome'])){

	?>
	<!DOCTYPE html>
	<html>
	<head>

	</script>  
	<meta charset="utf-8">
	<title>Cadastro de Usuario</title>
	<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/moment.js"></script>

	<script type="text/javascript">

		//retorna o valor da diaria ao escolher o veiculo

		function ver_km(id){

			$.post("<?php echo BASE_URL;?>veiculo/km1", {idVeiculo:id},function(retorno){

				$('#kmI').val(retorno);				
				
			});

		}


		

	</script>



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

<body style="background-color: #BEBEBE;">
	
	<div class="div_user">

		<a href="<?php echo BASE_URL;?>chamarTelas/voltar"><input type="button" name="" value="voltar"></a>

		<form action="<?php echo BASE_URL;?>manutencao/inserir" method="POST" >

			<fieldset >

				<legend style="font-size: 30px;">Cadastro de manutencão</legend>

				<table >

					<tr>
						<td><label>Data inicio:</label></td>
						<td><input type="date" name="data" required  autocomplete="off"></td>


						<tr>
							<td><label>Veiculo:</label></td>
							<td><select name="veiculo" onChange="ver_km(this.value)">
								<option value="">Selecionar</option>		

								<?php

								global $db;

								$sql = $db->prepare("SELECT * FROM Veiculo");
								$sql->execute();
								$dados = $sql->fetchall();

								foreach ($dados as $exibir) {

									echo "<option value=".$exibir['id'].">".$exibir['modelo']." ".$exibir['placa']."</option><br>";

									# code...
								}		

								?>	


							</select></td>
							<td><label>oficina:</label></td>
							<td><select name="Oficina" >
								<option value="">Selecionar</option>		

								<?php

								global $db;

								$sql = $db->prepare("SELECT * FROM oficina");
								$sql->execute();
								$dados = $sql->fetchall();

								foreach ($dados as $exibir_of) {

									echo "<option value=".$exibir_of['cnpj'].">".$exibir_of['nome_fantasia'];

									# code...
								}		

								?>							

							</select></td></tr>

							<tr>
								
								<td><label>KM:</label></td>
								<td><input type="text" name="km" id="kmI"></td>


								<td><label>Status:</label></td>
								<td><select name="status">
									<option>Selecinar</option>
									<option value="aberta">Aberta</option>
									<option value="fechada">Fechada</option>
									
								</select></td>
							</tr>

							<td><label>Status:</label></td>
							<td><select name="tipo">
								<option>Selecionar</option>
								<option value="preventiva">Preventiva</option>
								<option value="Corretiva">Corretiva</option>

							</select></td>


							<td><label>Serviço</label></td>
							<td><input type="text" name="servico"></td>
						</tr>

						

						<tr>

							<td><label>Descrição do<br>serviço:</label></td>
							<td><input type="text" " name="descricao" ></td>
						</tr>


						<tr>

							<td><label>Total<br>Manutenção:</label></td>
							<td><input type="text" name="total" id="total"></td>
						</tr>


						<tr>
							<td><label>Data Retorno: </label></td>
							<td><input type="date" name="data_retorno"></td>

						</tr>			
						

						
					</tr> 


				</table>


				<tr><td><input type="submit" name="enviar" value="Cadastrar_manutenção" ></td>
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