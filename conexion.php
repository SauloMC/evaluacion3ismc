<?php

	/**
	 * Clase Conexion
	 */
	Class Conexion{

	/**
	 * [$conn Variable para la conexion a la base de datos]
	 * @var [type]
	 */
	protected $conn;

	/**
	 * [Open funcion Open para abrir la conexión a la base de datos]
	 */
	public function Open(){
    try {
	    $conn = new PDO("mysql:host=localhost;dbname=credencial", "root", "");
	    echo "Conectado a la base de datos exitosamente.";
	} catch (PDOException $pe) {
    		die("No se ha podido conectar a la base de datos :" . $pe->getMessage());
		}

	return $conn;
	}

	/**
	 * [Close Función Close para cerrar la conexión a la base de datos]
	 */
	public function Close(){
			$conn = null;
		}
	}
?>

