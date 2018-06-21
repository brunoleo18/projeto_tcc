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
                <li><a href="<?php echo BASE_URL;?>chamarTelas/telaCadastro">1.Cadastro de Usuarios.</a></li>
                <li><a href="<?php echo BASE_URL;?>chamarTelas/telaVeiculo">2.Cadastro de Veiculos.</a></li>
                <li><a href="<?php echo BASE_URL;?>chamarTelas/telaCliente">3.Cadastro de Clientes.</a></li>
                <li><a href="<?php echo BASE_URL;?>chamarTelas/telaReserva">4.Cadastro de Reservas.</a></li>
                <li><a href="<?php echo BASE_URL;?>chamarTelas/telaOficina">5.Oficina</a></li>
                <li><a href="<?php echo BASE_URL;?>chamarTelas/telaManutencao">6.Manutenção</a></li>
                <li><a style="background-color: #7FFF00;" href="<?php echo BASE_URL;?>chamarTelas/telaAbastecimento">7.Abastecimento</a></li>
            </ul>
        </nav>


    </div>

    <div style="width: 300px; height: 10%; float:left; position: absolute; margin-top: 30px; ">
      <nav id="menu2" style="display: inline;">
        <ul style="list-style: none; padding: 10px; margin: 0px;">
            <li><a href="<?php echo BASE_URL;?>usuario/mostrar">Pesquisar Usuarios.</a></li>
            <li><a href="<?php echo BASE_URL;?>veiculo/mostrar">Pesquisar Veiculos.</a></li>
            <li><a href="<?php echo BASE_URL;?>cliente/mostrar"">pesquisar Clientes.</a></li>
            <li><a href="<?php echo BASE_URL;?>reserva/mostrar/aberta">Pesquisar Reservas.</a></li>
            <li><a href="<?php echo BASE_URL;?>oficina/mostrar">Oficinas</a></li>
            <li><a href="<?php echo BASE_URL;?>manutencao/mostrar/aberta">Pesquisar Manutenção</a></li>
            <li><a style="background-color: #7FFF00;" href="<?php echo BASE_URL;?>abastecimento/mostrar">7.Abastecimento</a></li>
        </ul>
    </nav>


</div>
<div style="width: 500px; height: 100px; border-color: red; float:right; background-color: #B0E0E6; margin-top: 20px; margin-right: 200px; border-radius: 10px; position:relative; text-align: center;">

    <?php

    global $db;

    $sql = $db->prepare("SELECT * FROM reservas where status='aberta'");

    $sql->execute();


    $dado = $sql->rowCount();



 echo "<a href='".BASE_URL."reserva/mostrar/aberta'><h1>Você possui <b>".$dado."</b> novas Reservas!!</h1></a>";
 

         

    ?>


   


</div>


</body>
</html>

<?php
}
?>
