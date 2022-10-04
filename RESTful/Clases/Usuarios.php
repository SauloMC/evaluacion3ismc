<?php 
	
	/**
	 * 
	 */
	class Usuarios
	{
		/**
		 * [$conn description]
		 * @var [type]
		 */
		private $conn;

		/**
		 * [$tabla description]
		 * @var string
		 */
		private $tabla = "usuario";

		/**
		 * [$idUsuario description]
		 * @var [type]
		 */
		public $idUsuario;

		/**
		 * [$usuario description]
		 * @var [type]
		 */
		public $usuario;

		/**
		 * [$nombre description]
		 * @var [type]
		 */
		public $nombre;

		/**
		 * [$apellido description]
		 * @var [type]
		 */
		public $apellido;

		/**
		 * [$pais description]
		 * @var [type]
		 */
		public $pais;

		/**
		 * [$estado description]
		 * @var [type]
		 */
		public $estado;

		/**
		 * [$tipoSangre description]
		 * @var [type]
		 */
		public $tipoSangre;

		/**
		 * [$contactoEm description]
		 * @var [type]
		 */
		public $contactoEm;

		/**
		 * [$telConEm description]
		 * @var [type]
		 */
		public $telConEm;

		/**
		 * [$enfermedad description]
		 * @var [type]
		 */
		public $enfermedad;

		/**
		 * [$alergia description]
		 * @var [type]
		 */
		public $alergia;

		/**
		 * [$fechanac description]
		 * @var [type]
		 */
		public $fechanac;

		/**
		 * [$vigencia description]
		 * @var [type]
		 */
		public $vigencia;

		/**
		 * @param [type] Función constructor
		 */
		public function __construct($db)
		{
			$this->conn = $db;

		}

		/**
		 * Función getUsuarios para obtener todos los datos de la base de datos
		 */
		public function getUsuarios(){
			$consultaSQL = "SELECT idUsuario, usuario, nombre, apellido, pais, estado, tipoSangre, contactoEm, telConEm, enfermedad, alergia, fechanac, vigencia FROM ".$this->tabla."";
			$stmt = $this->conn->prepare($consultaSQL);
			$stmt->execute();
			return $stmt;
		}

		/**
		 * Función getUsuariosId para obtener datos de un usuario por su id
		 */
		public function getUsuariosId($idUsuario){
			$consultaSQL = "SELECT idUsuario, usuario, nombre, apellido, pais, estado, tipoSangre, contactoEm, telConEm, enfermedad, alergia, fechanac, vigencia FROM ".$this->tabla." WHERE idUsuario = ".$idUsuario."";
			$stmt = $this->conn->prepare($consultaSQL);
			$stmt->execute();
			return $stmt;
		}
	}
