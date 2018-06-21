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

		<a href="<?php echo BASE_URL;?>usuario/mostrar"><input type="button" name="" value="voltar"></a>

		<form action="<?php echo BASE_URL;?>usuario/editar/alt" method="POST" >

			<input type="hidden" name="cpfAntigo" value="<?php echo $dados['cpf'];?>">

			<fieldset >

				<legend style="font-size: 30px;">Alterar Dados</legend>

				<table >

					<tr>

						<td><label>Nome:</label></td>
						<td><input type="text" name="nome" size="50" value="<?php echo $dados['nome'];?>" ></td>

						<td><label>CPF:</label></td>
						<td><input type="CPF" name="cpf" value="<?php echo $dados['cpf'];?>" size="14" required autocomplete="off"></td>

						<td><label>RG:</label>
							<input type="rg" name="rg" value="<?php echo $dados['rg'];?>" size="20"></td>


						</tr>

						<tr>
							<td><label>Email:</label></td>
							<td><input type="email" name="email" value="<?php echo $dados['email'];?>" size="50" autocomplete="off"></td>

							<td><label>Sexo:</label></td>
							<td><select name="sexo" required="">
								<option value="<?php echo $dados['sexo'];?>"><?php echo $dados['sexo'];?></option>
								<option value="M">Masculino</option>
								<option value="F">Feminino</option>
							</select></td>

							<td><label>D Nasc:</label>
								<input type="date" value="<?php echo $dados['dataNasc'];?>" name="data"></td>

							</tr>			

							<tr><td><label>Tipo:</label></td>
								<td><select name="tipo" required="">
									<option value="<?php echo $dados['tipo'];?>" ><?php if($dados['tipo'] == 1){ echo "Administrador";}else{echo "Usuario";}?> </option>
									<option value="1">Administrador</option>
									<option value="0">Usuario</option>
								</select></td>

								<td><label>Titulo:</label></td>
								<td><input type="titulo" name="titulo"value="<?php echo $dados['titulo'];?>" ></td>

							</tr> 

							<tr>
								<td><label>Telefone:</label></td>
								<td><input type="Telefone" name="telefone" value="<?php echo $dados['telefone'];?>" "></td>
								<td></td>
								

							</tr>

						</table>

						

							<tr><td><input type="submit" name="enviar" value="Atualizar" ></td>
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

