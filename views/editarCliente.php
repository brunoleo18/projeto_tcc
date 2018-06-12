<?php
if(isset($_SESSION['nome']) && !empty($_SESSION['nome'])){

	?>
<!DOCTYPE html>
<html>
<head>
	
</script>  
	<meta charset="utf-8">
	<title>Cadastro de Cliente</title>
	<style type="text/css">

	input, select{
		padding: 10px;
		border-radius: 5px;
	}

	.div_cliente{
		background-color: #E0EEE0;
		padding: 10px;
	}

	label{

		font-size: 25px;
	}

	#imgVoltar{

		width: 50px;
		height: 50px
	}

	#imgCliente{

		width: 120px;
		height: 120px;
	}


</style>
</head>

<body style="background-color: #BEBEBE;">
	
	<div class="div_cliente">

		<a href="<?php echo BASE_URL;?>chamarTelas/voltar"><input type="image" id="imgVoltar" title="VOLTAR TELA PRINCIPAL" src="http://localhost/Projeto_tcc/assets/image/voltar.png"></a>

		<form action="<?php echo BASE_URL;?>cliente/editar/alt" method="POST" >
			<input type="hidden" name="cpfAntigo" value="<?php echo $dados['cpf'];?>">

			<fieldset >

				<legend style="font-size: 30px;">Editar Clientes</legend>

				<table >

					<tr>

						<td><label>Nome:</label></td>
						<td><input type="text" name="nome" size="50" value="<?php echo $dados['nome'];?>" required "></td>

						<td><label>CPF:</label></td>
						<td><input type="CPF" name="cpf" value="<?php echo $dados['cpf'];?>" size="14" required autocomplete="off"></td>

						<td><label>RG:</label>
							<input type="rg" name="rg" value="<?php echo $dados['rg'];?>" size="20"></td>
						</tr>

						<tr>
							<td><label>Email:</label></td>
							<td><input type="email" name="email" size="50" value="<?php echo $dados['email'];?>" autocomplete="off" required></td>

							<td><label>Sexo:</label></td>
							<td><select name="sexo" required="">
								<option  value="<?php echo $dados['sexo'];?>"><?php echo $dados['sexo'];?></option>
								<option value="M">Masculino</option>
								<option value="F">Feminino</option>
							</select></td>

							<td><label>D Nasc:</label>
								<input type="date" value="<?php echo $dados['data_nasc'];?>" name="data"></td>

							</tr>	
							<tr>
							<td><label>CNH:</label></td>
								<td><input type="text" name="cnh" value="<?php echo $dados['cnh'];?>"required="" ></td>		

							<td><label>Categoria:</label></td>
								<td><select name="categoria" required="">
									<option value="<?php echo $dados['categoria'];?>"><?php echo $dados['categoria'];?></option>
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="C">C</option>
									<option value="D">D</option>
									<option value="E">E</option>
									<option value="AB">AB</option>
									<option value="AC">AC</option>
									<option value="AD">AD</option>
									<option value="AE">AE</option>
								</select></td>

							</tr> 

							<tr>
								<td><label>Telefone:</label></td>
								<td><input type="Telefone" name="telefone" value="<?php echo $dados['telefone'];?>"></td>
								<td><label>Profissão:</label></td>
								<td><input type="text" name="profissao" value="<?php echo $dados['profissao'];?>"></td>

							</tr>

						</table>

						<h2><b>Endereço:</b></h2>

						<table>

							<tr>
								<td><label>Rua:</label></td>
								<td><input type="text" name="rua" value="<?php echo $dados['rua'];?>" size="30"></td>

								<td><label>Nº:</label></td>
								<td><input type="text" value="<?php echo $dados['num'];?>" name="num"></td>	

								<td><label>Bairro:</label></td>
								<td><input type="text" value="<?php echo $dados['bairro'];?>" name="bairro" size="30"></td>

							</tr>

							<tr>
								<td>Cidade:</td>
								<td><input type="text" name="cidade" value="<?php echo $dados['cidade'];?>" size="30"></td>
								<td><label>CEP:</label></td>
								<td><input type="text" value="<?php echo $dados['cep'];?>"name="cep"></td>

								<td><label>Estado:</label></td>
								<td>
									<select name="estado">
										<option style="color: red;" value="<?php echo $dados['estado'];?>"><?php echo $dados['estado'];?></option>
										<option value="AC">Acre</option>
										<option value="AL">Alagoas</option>
										<option value="AP">Amapá</option>
										<option value="AM">Amazonas</option>
										<option value="BA">Bahia</option>
										<option value="CE">Ceará</option>
										<option value="DF">Distrito Federal</option>
										<option value="ES">Espírito Santo</option>
										<option value="GO">Goiás</option>
										<option value="MA">Maranhão</option>
										<option value="MT">Mato Grosso</option>
										<option value="MS">Mato Grosso do Sul</option>
										<option value="MG">Minas Gerais</option>
										<option value="PA">Pará</option>
										<option value="PB">Paraíba</option>
										<option value="PR">Paraná</option>
										<option value="PE">Pernambuco</option>
										<option value="PI">Piauí</option>
										<option value="RJ">Rio de Janeiro</option>
										<option value="RN">Rio Grande do Norte</option>
										<option value="RS">Rio Grande do Sul</option>
										<option value="RO">Rondônia</option>
										<option value="RR">Roraima</option>
										<option value="SC">Santa Catarina</option>
										<option value="SP">São Paulo</option>
										<option value="SE">Sergipe</option>
										<option value="TO">Tocantins</option>
									</select>
								</td>
							</tr>

							<tr>
								<td><label>Complemento:</label></td>
								<td><input type="text" name="complemento" value="<?php echo $dados['complemento'];?>" size="50"></td>
							</tr>

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