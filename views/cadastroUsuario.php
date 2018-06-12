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

<body style="background-color: #BEBEBE;">
	
	<div class="div_user">

		<a href="<?php echo BASE_URL;?>chamarTelas/voltar"><input type="button" name="" value="voltar"></a>

		<form action="<?php echo BASE_URL;?>usuario/inserirUser" method="POST" >

			<fieldset >

				<legend style="font-size: 30px;">Cadastro de usuario</legend>

				<table >

					<tr>

						<td><label>Nome:</label></td>
						<td><input type="text" name="nome" size="50" placeholder="Nome Completo" required "></td>

						<td><label>CPF:</label></td>
						<td><input type="CPF" name="cpf" placeholder="000.000.000-00" size="14" required autocomplete="off"></td>

						<td><label>RG:</label>
							<input type="rg" name="rg" size="20"></td>


						</tr>

						<tr>
							<td><label>Email:</label></td>
							<td><input type="email" name="email" size="50" autocomplete="off" required></td>

							<td><label>Sexo:</label></td>
							<td><select name="sexo" required="">
								<option>Selecionar</option>
								<option value="M">Masculino</option>
								<option value="F">Feminino</option>
							</select></td>

							<td><label>D Nasc:</label>
								<input type="date" name="data"></td>

							</tr>			

							<tr><td><label>Tipo:</label></td>
								<td><select name="tipo" required="">
									<option>seleciona</option>
									<option value="1">Administrador</option>
									<option value="0">Usuario</option>
								</select></td>

							</tr> 

							<tr>
								<td><label>Telefone:</label></td>
								<td><input type="Telefone" name="telefone" placeholder="00 0000 0000"></td>
								<td><label>Senha:</label></td>
								<td><input type="password" name="senha"></td>

							</tr>

						</table>

						
							<tr><td><input type="submit" name="enviar" value="Cadastrar_Usuario" ></td>
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