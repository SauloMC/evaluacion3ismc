<?php

	/**
	 * Incluir el archivo para la conexión a la base de datos
	 */
	require("conexion.php");

	if(isset($_POST['editar'])){
		$idUsuario = $_POST['idUsuario'];
		$usuario = $_POST['usuario'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$pais = $_POST['pais'];
		$estado = $_POST['estado'];
		$tipoSangre = $_POST['tipoSangre'];
		$contactoEm = $_POST['contactoEm'];
		$telConEm = $_POST['telConEm'];
		$enfermedad = $_POST['enfermedad'];
		$alergia = $_POST['alergia'];
		$fechanac = $_POST['fechanac'];
		$vigencia = $_POST['vigencia'];

		$conexion = new Conexion();

		$conexion -> Open();

	}

		$statement = $conexion -> Open() -> prepare("UPDATE usuario SET usuario='$usuario', nombre='$nombre', apellido='$apellido', pais='$pais', estado='$estado', tipoSangre='$tipoSangre', contactoEm='$contactoEm', telConEm='$telConEm', enfermedad='$enfermedad', alergia='$alergia', fechanac='$fechanac', vigencia='$vigencia' WHERE idUsuario = '$idUsuario'");

		$statement -> execute();

		$conexion -> Close();

		header("Location: consultar.php");

?>