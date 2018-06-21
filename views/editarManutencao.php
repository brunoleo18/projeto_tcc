<?php
if(isset($_SESSION['nome']) && !empty($_SESSION['nome'])){

	//var_dump($info);

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
		background-color: #808000;
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

		<form action="<?php echo BASE_URL;?>manutencao/editar/alt" method="POST" >

			<fieldset >

				<legend style="font-size: 30px;">Atualizar de manutencão</legend>

				<table >
					<tr>
						<td><label>ID:</label></td>
						<td><input type="text" name="id" value="<?php echo $info['0'];?>" readonly ></td>


						<tr>

					<tr>
						<td><label>Data inicio:</label></td>
						<td><input type="date" name="data" value="<?php echo $info['1'];?>" required  autocomplete="off"></td>


						<tr>
							<td><label>Veiculo:</label></td>
							<td><select name="veiculo" onChange="ver_km(this.value)">
								<option value="<?php echo $info['2'];?>"><?php echo $info['11']."--".$info['12'];?></option>		

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
								<option value="<?php echo $info['3'];?>"><?php echo $info['14'];?></option>		

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
								<td><input type="text" name="km" value="<?php echo $info['13'];?>" id="kmI"></td>


								<td><label>Status:</label></td>
								<td><select name="status">
									<option value="<?php echo $info['5'];?>"><?php echo $info['5'];?></option>
									<option value="aberta">Aberta</option>
									<option value="fechada">Fechada</option>
									
								</select></td>
							</tr>

							<td><label>manutencao:</label></td>
							<td><select name="tipo">
								<option value="<?php echo $info['6'];?>"><?php echo $info['6'];?></option>
								<option value="preventiva">Preventiva</option>
								<option value="Corretiva">Corretiva</option>

							</select></td>


							<td><label>Serviço</label></td>
							<td><input type="text" value="<?php echo $info['7'];?>" name="servico"></td>
						</tr>

						

						<tr>

							<td><label>Descrição do<br>serviço:</label></td>
							<td><input type="text" value="<?php echo $info['8'];?>" name="descricao" ></td>
						</tr>


						<tr>

							<td><label>Total<br>Manutenção:</label></td>
							<td><input type="text" name="total" value="<?php echo $info['9'];?>" id="total"></td>
						</tr>


						<tr>
							<td><label>Data Retorno: </label></td>
							<td><input type="date" value="<?php echo $info['10'];?>" name="data_retorno"></td>

						</tr>			
						

						
					</tr> 


				</table>


				<tr><td><input type="submit" name="enviar" value="Atualizar_manutenção" ></td>
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