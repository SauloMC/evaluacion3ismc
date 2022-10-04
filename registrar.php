<?php

	/**
	 * Incluir el archivo para la conexión a la base de datos
	 */
	require("conexion.php");

	/**
	 * Validar que se haya realizado el post en altas.php
	 */
	if(isset($_POST['guardar'])){
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

		/**
		 * [$conexion Objeto que instancia la clase Conexion para su uso]
		 * @var Conexion
		 */
		$conexion = new Conexion();

		/**
		 * El Objeto conexion abre la base de datos con la funcion Open de la clase Conexion
		 */
		$conexion -> Open();

	}

		/**
		 * [$statement Variable que guarda el statement preparado para realizar la consulta SQL]
		 * @var [type]
		 */
		$statement = $conexion -> Open() -> prepare("INSERT INTO usuario (usuario, nombre, apellido, pais, estado, tipoSangre, contactoEm, telConEm, enfermedad, alergia, fechanac, vigencia) VALUES ('$usuario', '$nombre', '$apellido', '$pais', '$estado', '$tipoSangre', '$contactoEm', '$telConEm', '$enfermedad', '$alergia', '$fechanac', '$vigencia')");	

		/**
		 * Ejecución de la consulta SQL
		 */
		$statement -> execute();

		/**
		 * Se cierra la conexión a la base de datos
		 */
		$conexion -> Close();


		/**
		 * Se redirige a altas.php
		 */
		header("Location: altas.php");

?>