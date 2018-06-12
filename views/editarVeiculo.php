<?php
if(isset($_SESSION['nome']) && !empty($_SESSION['nome'])){

	

	?>
	<!DOCTYPE html>
	<html>
	<head>

	</script>  
	<meta charset="utf-8">
	<title>Editar veiculo</title>
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

	#imgVoltar{

		width: 50px;
		height: 40px;
	}

	#imgAtu{

		width: 100px;
		height: 100px;
	}


</style>
</head>

<body style="background-color: #BEBEBE;">
	
	<div class="div_user">

		<a href="<?php echo BASE_URL;?>veiculo/mostrar"><img title="Voltar para lista de veiculos" id="imgVoltar" src="http://localhost/Projeto_tcc/assets/image/voltar.png"></a>

		<form action="<?php echo BASE_URL;?>veiculo/editar/atualizar" method="POST" >

			<fieldset >

				<legend style="font-size: 30px;">Editar Veiculos</legend>



				<table >
					<tr><td><label>ID:</label></td>
						
						<td><input type="number" name="id" value="<?php echo $dados['id'];?>" size="4" readonly="readonly"></td></tr>

						<tr>

							<td><label>Placa:</label></td>
							<td><input type="text" name="placa" size="15" value="<?php echo $dados['placa'];?>" required "></td>

							<td><label>Modelo:</label></td>
							<td><input type="text" name="modelo" size="15" value="<?php echo $dados['modelo'];?>" autocomplete="off"></td>

							<td><label>Marca:</label>
								<input type="text" name="marca" value="<?php echo $dados['marca'];?>"size="15"></td>


							</tr>

							<tr>
								<td><label>Ano:</label></td>
								<td><input type="ano" name="ano" size="15"  value="<?php echo $dados['ano_fabri'];?>"autocomplete="off" required></td>

								<td><label>Combustivel:</label></td>
								<td><select name="combustivel" required="">
									<option value="<?php echo $dados['combustivel'];?>"><?php echo $dados['combustivel'];?></option>
									<option value="Alcool">Alcool</option>
									<option value="Gasolina">Gasolina</option>
									<option value="Alcool e Gás">Alcool e Gás</option>
									<option value="Gasolina e Gás">Gasolina e Gás</option>
									<option value="Alcool, Gasolina e Gás">Alcool, Gasolina e Gás</option>
									<option value="Diesel">Diesel</option>
									<option value="Diesel e Biocombustivel">Diesel e Biocombustivel</option>
								</select></td>

								<td><label>Valor Diaria:</label>
									<input type="text" name="vDiaria" value="<?php echo $dados['6'];?>"></td>



								</tr>			

								<td><label>Km Inicial:</label></td>
								<td><input type="text" name="km_inicial" value="<?php echo $dados['7'];?>"></td>

								<td><label>Km Atual:</label></td>
								<td><input type="text" name="km_atual" value="<?php echo $dados['8'];?>"></td>

							</tr> 

							<tr>
								<td><label>Chassis:</label></td>
								<td><input type="text" name="chassis" value="<?php echo $dados['9'];?>"></td>
								<td><label>Documento:</label></td>
								<td><input type="text" name="documento" value="<?php echo $dados['10'];?>"></td>

							</tr>



							<tr><td><input type="image" id="imgAtu" src="http://localhost/Projeto_tcc//assets/image/atualizar.png"   title="atualizar veiculo">	</td>
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