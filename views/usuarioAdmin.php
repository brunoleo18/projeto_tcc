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

        #menu2 {
        	font-size: 20px;
        }

        #menu2 ul li{
        	padding: 10px 5px;
        	background-color:#EDEDED;
            color: #333;
            text-decoration: none;
            border-bottom:3px solid #EDEDED;

        }
	</style>
</head>
<body style="background-color: #BEBEBE;">

	<div style=" text-align: center; width: 100%; height: 90px; background-color: #008B8B; border: 2px; margin: 0px; margin-top: 0px; position: relative;">

		<nav id="menu" >
    <ul style="list-style: none; padding: 10px; margin: 0px;">
        <li><a href="<?php echo BASE_URL;?>chamarTelas/telaCadastro">Cadastro de Usuarios.</a></li>
        <li><a href="<?php echo BASE_URL;?>chamarTelas/telaVeiculo">Cadastro de Veiculos.</a></li>
        <li><a href="<?php echo BASE_URL;?>chamarTelas/telaCliente">Cadastro de Clientes.</a></li>
        <li><a href="<?php echo BASE_URL;?>chamarTelas/telaReserva">Cadastro de Reservas.</a></li>
        <li><a href="#">Manutenção</a></li>
    </ul>
</nav>


	</div>

	<div style="width: 300px; height: 10%;  position: relative; margin-top: 30px; ">
		<nav id="menu2" style="display: inline;">
    <ul style="list-style: none; padding: 10px; margin: 0px;">
        <li><a href="<?php echo BASE_URL;?>usuario/mostrar">Pesquisar Usuarios.</a></li>
        <li><a href="<?php echo BASE_URL;?>veiculo/mostrar">Pesquisar Veiculos.</a></li>
        <li><a href="<?php echo BASE_URL;?>cliente/mostrar"">pesquisar Clientes.</a></li>
        <li><a href="#">Pesquisar Reservas.</a></li>
        <li><a href="#">Pesquisar Manutenção</a></li>
    </ul>
</nav>
		

	</div>
    <div style="width: 500px; height: 100px; border-color: red; background-color: blue; position: absolute; margin-top: 30px; margin-left: 610px; margin-top: 0px; ">
       

       <h1>vc tem x Reservas novas</h1>
        

    </div>


</body>
</html>

<?php
}
    ?>
