<?php
if(isset($_SESSION['nome']) && !empty($_SESSION['nome'])){

	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo "Bem vindo ".$_SESSION['nome']; ?></title>

		<style type="text/css">
		
		#menu ul li{
			display: inline;
		}

		#menu ul li a {
			padding: 2px 10px;
			display: inline-block;

			/* visual do link */
			background-color:#EDEDED;
			color: #333;
			text-decoration: none;
			border-bottom:3px solid #EDEDED;
		}
		#menu ul li a:hover {
			background-color:#D6D6D6;
			color: #6D6D6D;
			border-bottom:3px solid #EA0000;
		}
	</style>
</head>
<body style="background-color: #BEBEBE;">

	<div style=" width: 100%; height: 90px; background-color: #008B8B; border: 2px; margin: 0px; margin-top: 0px; position: absolute;">

		

		<nav id="menu" >
			<ul style="list-style: none; padding: 0px; margin: 0px; text-align: center; padding: 15px;">
				<li><a href="#">Cadastro de Clientes.</a></li>
				<li><a href="#">Cadastro de Reservas.</a></li>
				
			</ul>
		</nav>


	</div>

</body>
</html>


<?php
}

	?>