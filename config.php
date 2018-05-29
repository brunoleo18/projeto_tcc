<?php

require "environment.php";

$config = array();

if(ENVIRONMENT == 'development'){
	
	define("BASE_URL","http//localhost/ProjetoMVC/");

	$config["dbname"] ='estrutura_mvc';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';

}else{
	//se for servidor externo
	

	$config['dbname'] ='estrutura_mvc';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';

}

global $db;

try{

	$pdo = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'],$config['dbuser'],$config['dbpass']);


}catch(PDOException $e){

	echo "ERRO".$e->getMessage();
	exit;
}