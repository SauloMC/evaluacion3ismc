<?php
/**
 * 
 */
class Database
{
	/**
	 * [$host variable que guarda el nombre de host]
	 * @var string
	 */
	private	$host = "localhost";

	/**
	 * [$database_name variable del nombre de la base de datos]
	 * @var string
	 */
	private $database_name= "credencial";

	/**
	 * [$username variable del nombre de usuario de la base de datos]
	 * @var string
	 */
	private $username= "root";

	/**
	 * [$password variable de la contraseña de la base de datos]
	 * @var string
	 */
	private $password = "";

	/**
	 * [$conn variable que guarda la conexión a la base de datos]
	 * @var [type]
	 */
	public $conn;

	/**
	 * Función para la conexión a la base de datos
	 */
	public function getConnection(){
		$this->conn =null;
		try{
			$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->database_name, $this->username, $this->password);
			$this->conn->exec("set names utf8");
		}catch(PDOException $e){
			echo "Error al conectar con la base de datos:". $e->getMessage();
		}
		return $this->conn;
	}
}
?>