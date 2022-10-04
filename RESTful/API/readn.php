<?php
	/**
	* Cabeceras, content type para configurar que el archivo será tipo json 	
	*/
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	/**
	 * 	Incluir clases de la API
	 */
	include_once '../Config/database.php';
	include_once '../Clases/Usuarios.php';

	/**
	 * [$idUsuario variable que obtiene el idUsuario por el método GET]
	 * @var [type]
	 */
	$idUsuario = $_GET['idUsuario'];

	/**
	 * [$objBaseDatos objeto de la base de datos]
	 * @var Database
	 */
	$objBaseDatos = new Database();

	/**
	 * [$db variable que obtiene la conexión a la base de datos]
	 * @var [type]
	 */
	$db = $objBaseDatos->getConnection();

	/**
	 * [$objUsuarios Objeto de la clase Usuarios]
	 * @var Usuarios
	 */
	$objUsuarios = new Usuarios($db);

	/**
	 * [$stmt Variable que obtiene ]
	 * @var [type]
	 */
	$stmt = $objUsuarios->getUsuariosId($idUsuario);

	/**
	 * [$totalUsuarios variable que cuenta el total de Usuarios]
	 * @var [type]
	 */
	$totalUsuarios = $stmt->rowCount();

	if($totalUsuarios > 0){
		$arregloUsuarios = array();
		$arregloUsuarios["Usuarios"] = array();
		$arregloUsuarios["TotalUsuarios"] = $totalUsuarios;

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

			array_push($arregloUsuarios["Usuarios"], $e);

		}
		echo json_encode($arregloUsuarios);

	}else{
		http_response_code(404);
		echo json_encode(
			array("message"=>"No se encontraron usuarios.")
		);
	}

?>