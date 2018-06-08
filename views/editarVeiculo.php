<?php
if(isset($_SESSION['nome']) && !empty($_SESSION['nome'])){

	?>
	<!DOCTYPE html>
	<html>
	<head>

	</script>  
	<meta charset="utf-8">
	<title>Cadastro de Veiculos</title>
	<style type="text/css">

	input, select{
		padding: 10px;
		border-radius: 5px;
	}

	.div_user{
		background-color: #1E90FF;
		padding: 10px;
	}

	label{

		font-size: 25px;
	}

	td{
		padding: 10px;
	}


</style>
</head>

<body style="background-color: #BEBEBE;">
	
	<div class="div_user">

		<a href="<?php echo BASE_URL;?>chamarTelas/voltar"><input type="button" name="" value="voltar"></a>

		<form action="<?php echo BASE_URL;?>veiculo/cadastrar" method="POST" >

			<fieldset >

				<legend style="font-size: 30px;">Cadastro de Veiculos</legend>

				<table >

					<tr>

						<td><label>Placa:</label></td>
						<td><input type="text" name="placa" size="15" placeholder="kkk-0099" required "></td>

						<td><label>Modelo:</label></td>
						<td><input type="text" name="modelo" size="15" required autocomplete="off"></td>

						<td><label>Marca:</label>
							<input type="text" name="marca" size="15"></td>


						</tr>

						<tr>
							<td><label>Ano:</label></td>
							<td><input type="ano" name="ano" size="15" autocomplete="off" required></td>

							<td><label>Combustivel:</label></td>
							<td><select name="combustivel" required="">
								<option value="Alcool">Alcool</option>
								<option value="Gasolina">Gasolina</option>
								<option value="Alcool e Gás">Alcool e Gás</option>
								<option value="Gasolina e Gás">Gasolina e Gás</option>
								<option value="Alcool, Gasolina e Gás">Alcool, Gasolina e Gás</option>
								<option value="Diesel">Diesel</option>
								<option value="Diesel e Biocombustivel">Diesel e Biocombustivel</option>
							</select></td>

							<td><label>Valor Diaria:</label>
								<input type="text" name="vDiaria"></td>

								

							</tr>			

							<td><label>Km Inicial:</label></td>
							<td><input type="text" name="km_inicial"></td>

							<td><label>Km Atual:</label></td>
							<td><input type="text" name="km_atual"></td>

						</tr> 

						<tr>
							<td><label>Chassis:</label></td>
							<td><input type="text" name="chassis" "></td>
							<td><label>Documento:</label></td>
							<td><input type="text" name="documento"></td>

						</tr>

						

						<tr><td><input type="submit" name="enviar" value="Cadastrar Veiculo" ></td>
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