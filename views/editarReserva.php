<?php
if(isset($_SESSION['nome']) && !empty($_SESSION['nome'])){
	//var_dump($info);

	?>
	<!DOCTYPE html>
	<html>
	<head>

	</script>  
	<meta charset="utf-8">
	<title>Cadastro de Reserva</title>
	<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/moment.js"></script>

	<script type="text/javascript">

		//retorna o valor da diaria ao escolher o veiculo

		function diaria1(id){

			$.post("<?php echo BASE_URL;?>veiculo/diaria1", {idVeiculo:id},function(retorno){

				$('#diaria2').val(retorno);				
				
			});

		}


		
		//pega a data de inicio e a data final e calcula o valor total da reserva

		function calc_total(date2){

			var dataInicio = new Date(document.getElementById("dataIni").value);
			var dataFim = new Date(date2);
			var diffMilissegundos = dataFim - dataInicio;
			var diffSegundos = diffMilissegundos / 1000;
			var diffMinutos = diffSegundos / 60;
			var diffHoras = diffMinutos / 60;
			var diffDias = diffHoras / 24;
			var diffMeses = diffDias / 30;		

			var valor = document.getElementById("diaria2").value;	

			var total = diffDias * valor;


			$('#total').val(total);

			
			alert(total);

		}	


		function kmRodado(kmF){

			
			var kmI = document.getElementById("kmI").value;

			var tot = kmF - kmI;


			$('#totalKm').val(tot);


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

		<form action="<?php echo BASE_URL;?>reserva/editar/alt" method="POST" >

			<fieldset >

				<legend style="font-size: 30px;">Cadastro de Reserva</legend>

				<table >

					<tr>
						<td><label>ID:</label></td>
						<td><input type="text" name="id" readonly value="<?php echo $info['0'];?>"></td>

						<tr>
							<td><label>CPF:</label></td>
							<td><input type="cpf" name="cpf" placeholder="000.000.000-00" size="14" value="<?php echo $info['1'];?>" id="cpf" onChange="nomeRetorno(this.value)" required maxlength="11" autocomplete="off"></td>




							<tr>
								<td><label>Veiculo:</label></td>
								<td><select name="veiculo" onChange="diaria1(this.value)">
									<option value="<?php echo $info['2'];?>"><?php echo $info['modelo']."--".$info['placa'];?></option>		

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
								<td><label>Valor Diaria</label></td>
								<td><input type="text" name="diaria" id="diaria2" value="<?php echo $info['valor_d'];?>" id="dataIni" readonly=""></td>
							</tr>



							<tr>
								<td><label>data inicio:</label></td>
								<td><input type="date" name="data_ini" 	value="<?php echo $info['3'];?>" id="dataIni" ></td>
							</tr>


							<tr>
								<td><label>data final  : </label></td>
								<td><input type="date" name="data_Fim" id="dataF" value="<?php echo $info['4'];?>" onChange="calc_total(this.value)"></td>

							</tr>			
							<tr>

								<td><label>Total Reserva:</label></td>
								<td><input type="num" name="total1" id="total" value="<?php echo $info['5'];?>" required readonly></td>
							</tr>

							<tr><td><label>Status:</label></td>
								<td><select name="status" required="">
									<option value="<?php echo $info['6'];?>"><?php echo $info['6'];?></option>
									<option value ="andamento">Andamento</option>
									<option value="finalizada">Finalizada</option>
								</select></td>

							</tr> 

							<tr>

								<td><label>Hora saida:</label></td>
								<td><input type="time" name="hora_saida" value="<?php echo $info['7'];?>" required ></td>
								<td><label>Hora chegada:</label></td>
								<td><input type="time" name="hora_chegada" value="<?php echo $info['8'];?>" required ></td>

							</tr>

							<tr>

								<td><label>KM saida:</label></td>
								<td><input type="text" name="km_saida" value="<?php echo $info['9'];?>" id="kmI"  required ></td>
								<td><label>Km chegada:</label></td>
								<td><input type="text" name="km_chegada" value="<?php echo $info['10'];?>" id="KmF" onChange="kmRodado(this.value)" required></td>
							</tr>


							<tr>
								<td><label>Km Rodados:</label></td>
								<td><input type="text" name="Km_rodados" value="<?php echo $info['11'];?>" id="totalKm" ></td>

							</tr>




						</table>


						<tr><td><input type="submit" name="enviar" value="Atualizar_Reserva" ></td>
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