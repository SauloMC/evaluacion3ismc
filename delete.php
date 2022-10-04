<?php
	
	/**
	 * [$idUsuario Variable que captura el idUsuario]
	 * @var [type]
	 */
	$idUsuario=$_GET['idUsuario'];

	echo $idUsuario;

	/**
	 * [$conexion Variable objeto que instancia la clase PDO para utilzarla para conectar a la base de datos]
	 * @var PDO
	 */
	$conexion=new PDO("mysql:host=localhost;dbname=credencial","root","");
	  //echo "conectado! ! !";

	/**
	 * [$consulta Variable que guarda y prepara una consulta SQL para proximamente ejecutarla]
	 * @var [type]
	 */
	$consulta= $conexion->prepare("DELETE FROM usuario WHERE idUsuario=".$idUsuario."");
	$consulta -> bindParam('idUsuario', $idUsuario, PDO::PARAM_INT);

	/**
	 * Ejecucion de la query SQL
	 */
	$consulta-> execute();

	/**
	 * Redirige a consultar.php
	 */
	 header('Location:consultar.php');

  ?>