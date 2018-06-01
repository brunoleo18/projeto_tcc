<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Locadora de Carros</title>

</head>
<body>

	<div style="width: 100%; height: 100px;  background:#00FF7F; margin-top:  0%; border-radius: 5px; position: relative;">
		
		<h1 style="text-transform: capitalize; padding: 15px;">bem vindo<?php echo " ".$_SESSION['nome']?></h1>


	</div>

	
	<hr>

	<?php $this->loadViewInTemplete($viewName, $dados);?>

</body>
</html>