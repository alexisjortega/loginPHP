<?php
	/*Parametros Rayne*/
	$server ='localhost';
	$username = 'root';
	$password = '';
	$database ='projecto_alex_database';

	/*Parametros Alexis*/
	/*$server ='localhost:3310';
	$username = 'root';
	$password = '';
	$database ='projecto_alex_database';*/

	try {
		$conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
	} catch (PDOException $e) {
		die('conexion fallida: '.$e->getMessage());
	}

?>
	 