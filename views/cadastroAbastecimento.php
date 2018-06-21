<?php
if(isset($_SESSION['nome']) && !empty($_SESSION['nome'])){

	?>
	<!DOCTYPE html>
	<html>
	<head>

	</script>  
	<meta charset="utf-8">
	<title>Cadastro de abastecimento</title>
	<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/moment.js"></script>

	<script type="text/javascript">

		//retorna o valor total do abastecimento

		function totalL(id){

			var quant = document.getElementById("quant").value;

			var to = id * quant;

				$('#totall').val(to);				
				
			

		}

		function totalL2(id){

			var quant = document.getElementById("preco").value;

			var to = id * quant;

				$('#totall').val(to);				
				
			

		}


		

	</script>



	<style type="text/css">

	input, select{
		padding: 10px;
		border-radius: 5px;
	}

	.div_user{
		background-color: #3CB371;
		padding: 10px;
	}

	label{

		font-size: 25px;
		text-align: center;
	}


</style>
</head>

<body style="background-color: #BEBEBE;">
	
	<div class="div_user">

		<a href="<?php echo BASE_URL;?>chamarTelas/voltar"><input type="button" name="" value="voltar"></a>

		<form action="<?php echo BASE_URL;?>abastecimento/inserir" method="POST" >

			<fieldset >

				<legend style="font-size: 30px;">Cadastro de Abastecimento</legend>

				<table >

					<tr>
						<td><label>Data<br>Abastecimento:</label></td>
						<td><input type="date" name="data_ab" required  autocomplete="off"></td>


						<tr>
							<td><label>Veiculo:</label></td>
							<td><select name="veiculo" >
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

							<td><label>Km:</label></td>
							<td><input type="text" name="km" id="kmI"></td>

							

							<tr>
								
								<td><label>Posto:</label></td>
								<td><input type="text" name="posto" ></td>

							</tr>


								<td><label>Combustivel:</label></td>
								<td><select name="combustivel">
									<option>Selecinar</option>
									<option value="etanol">Etanol</option>
									<option value="gasolina">Gasolina</option>
									<option value="disel">Disel</option>
									<option value="biodisel">Biodisel</option>
									<option value="GNV">GNV</option>
									
								</select></td>
							</tr>

							<td><label>Unidade:</label></td>
							<td><select name="unidade">
								<option>Selecionar</option>
								<option value="litro">Litro</option>
								<option value="M3">M<sup>3</sup></option>

							</select></td>


							</tr>

						

						<tr>


							<td><label>Quant<br>Abastecida:</label></td>
							<td><input type="text" " name="quant" id="quant" onChange="totalL2(this.value)"></td>

							<td><label>preço<br>Litro/M<sup>3</sup></label></td>
							<td><input type="text" name="valor_unit" id="preco" onChange="totalL(this.value)"></td>
						</tr>


						<tr>

							<td><label>Total<br>Abastecido:</label></td>
							<td><input type="text" name="total" id="totall" readonly=""></td>
						</tr>


								
						

						
					</tr> 


				</table>


				<tr><td><input type="submit" name="enviar" value="Cadastrar_abastecimento" ></td>
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