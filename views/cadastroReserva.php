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

		function diaria1(id){

			$.post("<?php echo BASE_URL;?>veiculo/diaria1", {idVeiculo:id},function(retorno){

				$('#diaria2').val(retorno);				
				
			});

		}


		//retorna o nome ao digitar o cpf

		function nomeRetorno(cpf){						


			$.post("<?php echo BASE_URL;?>cliente/retornaNome", {cpf:cpf},function(retorno){

				
				    $('#nome').val(retorno);	

					alert('Cliente '+retorno);					
				

					//$('#cpf').val("");
					//alert('Cliente não cadastrado');
						
				
				
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

		<form action="<?php echo BASE_URL;?>reserva/inserir" method="POST" >

			<fieldset >

				<legend style="font-size: 30px;">Cadastro de Reserva</legend>

				<table >

					<tr>
						<td><label>CPF:</label></td>
						<td><input type="cpf" name="cpf" placeholder="000.000.000-00" size="14" id="cpf" onChange="nomeRetorno(this.value)" required maxlength="11" autocomplete="off"></td>


						<tr>
							<td><label>Nome:</label></td>
							<td><input type="text" name="nome" id="nome" size="50" placeholder="Nome Completo" required readonly="readonly"></td>
						</tr>

						<tr>
							<td><label>Veiculo:</label></td>
							<td><select name="veiculo" onChange="diaria1(this.value)">
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
							<td><label>Valor Diaria</label></td>
							<td><input type="text" name="diaria" id="diaria2"  readonly=""></td>
						</tr>

						

						<tr>

							<td><label>data inicio:</label></td>
							<td><input type="date" name="data_ini" id="dataIni"></td>
						</tr>


						<tr>
							<td><label>data final  : </label></td>
							<td><input type="date" name="data_Fim" id="dataF" onChange="calc_total(this.value)"></td>

						</tr>			
						<tr>

							<td><label>Total Reserva:</label></td>
							<td><input type="num" name="total1" id="total" required readonly></td>
						</tr>

						
						<input type="hidden" name="status" value="aberta">

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