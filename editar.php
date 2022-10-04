<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    	<script src="https://kit.fontawesome.com/7508f69706.js" crossorigin="anonymous"></script>

    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    	<nav class="navbar navbar-expand-lg navbar-light bg-primary">
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavDropdown">
		    <ul class="navbar-nav">
		      <li class="nav-item">
		        <a class="nav-link" href="index.html"><i class="fas fa-home fa-2x"></i> &nbsp;</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="altas.php"><i class="fas fa-solid fa-user"></i> &nbsp;Registrar Usuario</a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link" href="consultar.php"><i class="fas fa-address-book"></i> Consultar Registros</a>
		      </li>
          <li class="nav-item">
            <a class="nav-link" href="eliminar.php"><i class="fas fa-trash"></i> Eliminar Registros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="imprimir.php"><i class="fas fa-address-card"></i> Imprimir Credencial</a>
          </li>
		    </ul>
		  </div>
		</nav>


		<title>Evaluación 3</title>

	</head>
	<body>
    <?php 

      /**
       * [$idUsuario Variable idUsuario que obtiene el idUsuario]
       * @var [type]
       */
      $idUsuario=$_GET['idUsuario'];

      /**
       * Se incluye el archivo de conexion para hacer consultas a la base de datos
       */
      require('conexion.php');

      /**
       * [$connect Variable objeto que instancia la clase Conexion]
       * @var Conexion
       */
      $connect = new Conexion();

        /**
         * Se abre la conexion a la base de datos
         */
          $connect->Open();

        /**
         * [$statement Variable que abre la conexion a la base de datos y prepara una sentencia para posteriormente ejecutarla]
         * @var [type]
         */
        $statement = $connect -> Open() -> prepare("SELECT * FROM usuario WHERE idUsuario=".$idUsuario."");
        $statement-> execute();

        /**
         * [$resultado Variable que guarda todas las filas del conjunto de resultados]
         * @var [type]
         */
        $resultado= $statement->fetchAll(PDO::FETCH_ASSOC);

        /**
         * Ciclo que por cada resultado elegido nos mostrara todos los datos que hay en los campos y los rellenará automáticamente
         */
      foreach($resultado as $mostrar){

    ?>
		<main role = "main" class = "container">
        <div class = "container-fluid">
            <form method="POST" action="edit.php" class = "was-validated" novalidate>
                <div class= "form-floating">
                  <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $mostrar['idUsuario']; ?>" class="form-control" required/> 
                </div>

                <div class="form-group">
                  <label for="usuario">Usuario: </label>
                  <input type="text" class="form-control" name="usuario" id="usuario" value="<?php echo $mostrar['usuario']; ?>" placeholder="Usuario" required>
                  <div class="valid-feedback">
                  Usuario válido.
                </div>
                <div class="invalid-feedback">
                  Escribe un usuario válido.
                    </div>
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre(s): </label>
                  <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $mostrar['nombre']; ?>" placeholder="Nombre" required>
                  <div class="valid-feedback">
                  Nombre válido.
                </div>
                <div class="invalid-feedback">
                  Escribe un nombre válido.
                </div>
                </div>
                <div class="form-group">
                  <label for="apellido">Apellido(s): </label>
                  <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $mostrar['apellido']; ?>" placeholder="Apellido" required>
                  <div class="valid-feedback">
                  Apellido válido.
                </div>
                <div class="invalid-feedback">
                  Escribe un apellido válido.
                </div>
                </div>
                <div class="form-group">
                  <label for="pais">Pais: </label>
                <input class="form-control" list="datalistOptions1" name="pais" id="pais" value="<?php echo $mostrar['pais']; ?>" placeholder="Escribe para buscar..." required>
                          
                              <datalist id="datalistOptions1">
                              <option value="Afganistán"/>
                              <option value="Albania"/>
                              <option value="Argelia"/>
                              <option value="Andorra"/>
                              <option value="Argentina"/>
                              <option value="Australia"/>
                              <option value="Austria"/>
                              <option value="Bahamas"/>
                              <option value="Bangladesh"/>
                              <option value="Bielorrusia"/>
                              <option value="Bélgica"/>
                              <option value="Belice"/>
                              <option value="Bolivia"/>
                              <option value="Brasil"/>
                              <option value="Canadá"/>
                              <option value="Islas Caimán"/>
                              <option value="China"/>
                              <option value="Colombia"/>
                              <option value="Costa Rica"/>
                              <option value="Cuba"/>
                              <option value="República Checa"/>
                              <option value="Dinamarca"/>
                              <option value="República Dominicana"/>
                              <option value="Francia"/>
                              <option value="Alemania"/>
                              <option value="India"/>
                              <option value="Italia"/>
                              <option value="Japón"/>
                              <option value="Luxemburgo"/>
                              <option value="Madagascar"/>
                              <option value="Maldivas"/>
                              <option value="Malasia"/>
                              <option value="México"/>
                              <option value="Mónaco"/>
                              <option value="Marruecos"/>
                              <option value="Nueva Zelanda"/>
                              <option value="Noruega"/>
                              <option value="Pakistán"/>
                              <option value="Panamá"/>
                              <option value="Filipinas"/>
                              <option value="Polonia"/>
                              <option value="Puerto Rico"/>
                              <option value="Rumanía"/>
                              <option value="Federación Rusa"/>
                              <option value="Singapur"/>
                              <option value="España"/>
                              <option value="Suiza"/>
                              <option value=" Turquía"/>
                              <option value="Reino Unido"/>
                              <option value="Emiratos Árabes Unidos"/>
                              <option value="Estados Unidos"/>
                              <option value="Uruguay"/>
                              <option value="Ciudad del Vaticano"/>
                              <option value="Vietnam"/>
                              <option value="Islas Virgenes Británicas"/>
                              </datalist>
                            <div class="valid-feedback">
                                País válido.
                            </div>
                            <div class="invalid-feedback">
                                Escriba un país.
                            </div>
                </div>
                <div class= "form-floating">
                <input type="hidden" id="fecha" name="fecha" class="form-control" value="<?php echo date("Y-n-j"); ?>" required/>
            	</div>
   				<div class="form-group">
                  <label for="estado">Estado: </label>
                  <input type="text" class="form-control" name="estado" id="estado" value="<?php echo $mostrar['estado']; ?>" placeholder="Estado" required>
                  <div class="valid-feedback">
                  Estado válido.
                </div>
                <div class="invalid-feedback">
                  Escribe un estado válido.
                </div>
                </div>
                <div class="form-group">
                  <label for="tipoSangre">Tipo de sangre: </label>
                 <input class="form-control" list="datalistOptions2" name="tipoSangre" id="tipoSangre" value="<?php echo $mostrar['tipoSangre']; ?>" placeholder="Tipo de sangre" required>
                            <datalist id="datalistOptions2">
                              <option value="O-"/>
                              <option value="O+"/>
                              <option value="A-"/>
                              <option value="A+"/>
                              <option value="B-"/>
                              <option value="B+"/>
                              <option value="AB-"/>
                              <option value="AB+"/>
                          	</datalist>
                  <div class="valid-feedback">
                  Tipo de sangre válido.
                </div>
                <div class="invalid-feedback">
                  Escribe un tipo de sangre válido.
                </div>
                </div>
                <div class="form-group">
                  <label for="contactoEm">Contacto de Emergencia: </label>
                  <input type="text" class="form-control" name="contactoEm" id="contactoEm" value="<?php echo $mostrar['contactoEm']; ?>" placeholder="Contacto de emergencia" required>
                  <div class="valid-feedback">
                  Contacto de emergencia válido.
                </div>
                <div class="invalid-feedback">
                  Escribe un contacto de emergencia válido.
                </div>
                </div>
                <div class="form-group">
                  <label for="telConEm">Telefono de contacto de emergencia: </label>
                  <input type="number" class="form-control" name="telConEm" id="telConEm" value="<?php echo $mostrar['telConEm']; ?>" placeholder="Telefono de contacto de emergencia" required>
                  <div class="valid-feedback">
                  Teléfono válido.
                </div>
                <div class="invalid-feedback">
                  Escribe un teléfono válido.
                </div>
                </div>
                <div class="form-group">	
                  <label for="enfermedad">¿Alguna enfermedad que mencionar?</label>
                  <input type="text" class="form-control" name="enfermedad" id="enfermedad" value="<?php echo $mostrar['enfermedad']; ?>" placeholder="Alguna enfermedad que mencionar">
                  <small id="HelpBlock1" class="form-text text-muted">
  					Dejar en blanco si no se cuenta con alguna enfermedad o contestar "No".
				  </small>
                </div>
                <div class="form-group">
                  <label for="alergia">¿Alguna alergia? </label>
                  <input type="text" class="form-control" name="alergia" id="alergia" value="<?php echo $mostrar['alergia']; ?>" placeholder="Alguna alergia que mencionar">
                  <small id="HelpBlock2" class="form-text text-muted">
  					Dejar en blanco si no se cuenta con alguna alergia o contestar "No".
				  </small>
                </div>
                 <div class="form-group">
                  <label for="fechanac">Fecha de Nacimiento:  </label>
                  <input type="date" class="form-control" name="fechanac" id="fechanac" value="<?php echo $mostrar['fechanac']; ?>" min="2-12-1969" max="2-12-2003" required>
                 </div>
                  <div class="form-group">
                  <label for="vigencia">Vigencia:  </label>
                  <input type="date" class="form-control" name="vigencia" id="vigencia" value="<?php echo $mostrar['vigencia']; ?>"" min="02-12-2021" max="02-12-2030" required>
                 </div>
              </div><br>
              <div class="col-xs-7">
              <input name="editar" type="submit" value="Editar" class = "btn btn-primary btn-lg">
              </div>
          </form>
        <?php } ?>
        </div>
        </main>
	

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
	</html>