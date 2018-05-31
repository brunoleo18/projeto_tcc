<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/styleLogin.css">
	<title>Login</title>
	<meta charset="utf-8">
</head>
<body >
	<center>
		<div class="div1" ">

			<h2 style="padding-top: 15px;">Tela de acesso</h2>

			<form method="POST"  action="<?php echo BASE_URL;?>usuario" style="padding: 20px;">
				<table>
					<tr>
						<td>Email:</td>
						<td><input class="nome" type="email" name="email" required ></td>
					</tr>
					<tr>
						<td>Senha:</td>
						<td><input class="nome" type="password" name="senha" required></td>
					</tr>
					<tr><td></td>
						<td><input type="submit" class="sub"  src="<?php echo BASE_URL;?>/assets/image/cadeado.jpg" name="enviar" value="Logar" ></td></tr>



				</table>



			</form>

			<a href="">Esqueceu sua senha?</a>
			


		</div><br>

		<b><label style=" color: #00C5CD; font-size: 25px;">BMTEH 2018<br>
		todos os direitos reservados<br><br> duvidas?<br>
	brunoleonet@hotmail.com</label></b>


	</center>

</body>
</html>