<?php 

	/**
	 * Cabeceras, content-type especificando que es un archivo json
	 */
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	/**
	 * Librerías incluidas de la API
	 */
	include_once '../Config/database.php';
	include_once '../Clases/Usuarios.php';

	/**
	 * [$objBaseDatos Objeto de la base de datos]
	 * @var Database
	 */
	$objBaseDatos = new Database();

	/**
	 * [$db Variable que hace la conexixón a la base de datos]
	 * @var [type]
	 */
	$db = $objBaseDatos->getConnection();

	/**
	 * [$objUsuarios Objeto de la clase Usuarios]
	 * @var Usuarios
	 */
	$objUsuarios = new Usuarios($db);

	/**
	 * [$stmt Variable que ejecuta la función getUsuarios para obtener todos los datos de la base de datos]
	 * @var [type]
	 */
	$stmt = $objUsuarios->getUsuarios();
	$totalUsuarios = $stmt->rowCount();

	/**
	 * Si el total de usuarios es mayor a 0 crear arreglo
	 */
	if($totalUsuarios > 0){
		$arregloUsuarios = array();
		//$arregloUsuarios["Usuarios"] = array();
		//$arregloUsuarios["TotalUsuarios"] = $totalUsuarios;

		/**
		 * [$row variable row guarda y se extrae los datos de la variable $stmt]
		 * @var [type]
		 */
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			$e = array(
				"idUsuario" => $idUsuario,
				"usuario" => $usuario,
				"nombre" => $nombre,
				"apellido" => $apellido,
				"pais" => $pais,
				"estado" => $estado,
				"tipoSangre" => $tipoSangre,
				"contactoEm" => $contactoEm,
				"telConEm" => $telConEm,
				"enfermedad" => $enfermedad,
				"alergia" => $alergia,
				"fechanac" => $fechanac,
				"vigencia" => $vigencia
			);

			array_push($arregloUsuarios, $e);

		}
		echo json_encode($arregloUsuarios);

	}else{
		http_response_code(404);
		echo json_encode(
			array("message"=>"No se encontraron usuarios.")
		);
	}

?>