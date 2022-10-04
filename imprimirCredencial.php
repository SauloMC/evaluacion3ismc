<?php
	/**
	 * Inclusión de las librerias de Fpdf
	 */
	require("fpdf.php");

	/**
	 * [$idUsuario Variable que obtiene la ID del usuario]
	 * @var [type]
	 */
	$idUsuario=$_GET['idUsuario'];

	/**
	/**
	 * [$conexion Variable para la conexion a la base de datos con PDO]
	 * @var PDO
	 
	$conexion=new PDO("mysql:host=localhost;dbname=credencial","root","");

	/**
	 * [$consulta Variable que prepara y ejecuta una sentencia SQL]
	 * @var [type]
	 
 	$consulta= $conexion->prepare("SELECT * from usuario where idUsuario=".$idUsuario."");
  	$consulta-> execute();

  	/**
  	 * [$resultado Variable que guarda todos los resultados obtenidos]
  	 * @var [type]
  	 
   	$resultado= $consulta->fetchAll(PDO::FETCH_ASSOC);
	*/

   	/**
   	 * [$data variable con json decodificado que obtiene los datos mediante la URL de la ejecución de la API]
   	 * @var [type]
   	 */
	$data = json_decode(file_get_contents("http://localhost/evaluacion3ismc/RESTful/API/readn.php?idUsuario=$idUsuario"), true);

	/**
   	* Clase PDF que hereda de la clase FPDF para manejar y crear el documento PDF
   	*/
   class PDF extends FPDF{
   }
   	foreach ($data as $mostrar) {
   		foreach ($mostrar as $show) {
	   		ob_end_clean();

	   		/**
	   		 * [$pdf Creación del PDF]
	   		 * @var PDF
	   		 */
			$pdf=new PDF();

			/**
			 * Se añade una página
			 */
			$pdf->AddPage();

			/**
			 * Se crea un color de relleno
			 */
			$pdf->SetFillColor(31,141,218);

			/**
			 * Se crea un rectangulo rellenado con el color previamente creado
			 */
			$pdf->Rect(20,10,55,50, 'F');

			/**
			 * Se especifica el tipo de fuente y el tamaño de la misma
			 */
			$pdf->SetFont("Times","B",12);

			/**
			 * Se crea margen
			 */
			$pdf->SetMargins(25,20,25);

			/**
			 * Se le da una posición Y
			 */
			$pdf->SetY(10);

			/**
			 * Se añade un texto y se le concatena la variable con el dato de la base de datos centrado
			 */
			$pdf->Cell (0,5,utf8_decode('Nombre: '.$show['nombre']),0,1,'C');
			$pdf->Ln(3);
			$pdf->SetFont("Times","B",12);
			$pdf->SetMargins(25,20,25);
			$pdf->SetY(10);
			$pdf->Cell (0,5,utf8_decode('Apellido: '.$show['apellido']),0,1,'R');
			$pdf->Ln(3);
			$pdf->SetFont("Times","B",12);
			$pdf->SetMargins(25,20,25);
			$pdf->SetY(20);
			$pdf->SetX(35);
			$pdf->Cell (0,5,utf8_decode('Pais: '.$show['pais']),0,1,'C');
			$pdf->Ln(3);
			$pdf->SetFont("Times","B",12);
			$pdf->SetMargins(25,20,25);
			$pdf->SetY(20);
			$pdf->SetX(35);
			$pdf->Cell (0,5,utf8_decode('Estado: '.$show['estado']),0,1,'R');
			$pdf->Ln(3);
			$pdf->SetFont("Times","B",12);
			$pdf->SetY(30);
			$pdf->SetX(25);
			$pdf->Cell (0,5,utf8_decode('Tipo de Sangre:'.$show['tipoSangre']),0,1,'C');
			$pdf->Ln(3);
			$pdf->SetFont("Times","B",12);
			$pdf->SetY(40);
			$pdf->SetX(40);
			$pdf->Cell (0,5,utf8_decode('Contacto de Emergencia:'.$show['contactoEm']),0,1,'C');
			$pdf->Ln(3);
			$pdf->SetFont("Times","B",12);
			$pdf->SetY(50);
			$pdf->SetX(52);
			$pdf->Cell (0,5,utf8_decode('Teléfono de Emergencia: '.$show['telConEm']),0,1,'C');
			$pdf->Ln(3);
			$pdf->SetFont("Times","B",12);
			$pdf->SetY(62);
			$pdf->SetX(19);
			$pdf->Cell (0,5,utf8_decode('Usuario:'.$show['usuario']),0,1,'L');
			$pdf->Ln(3);
			$pdf->SetFont("Times","B",12);
			$pdf->SetY(60);
			$pdf->SetX(78);
			$pdf->Cell (0,5,utf8_decode('Vigencia:'.$show['vigencia']),0,1,'C');
			$pdf->Ln(3);
			$pdf->Output();
		}
	}	