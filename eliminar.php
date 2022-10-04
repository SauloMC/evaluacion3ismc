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
		        <a class="nav-link" href="index.html"><i class="fas fa-home fa-2x"></i></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="altas.php"><i class="fas fa-user"></i> Registrar Usuario</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="consultar.php"><i class="fas fa-address-book"></i> Consultar Registros</a>
		      </li>
		      <li class="nav-item active">
          		<a class="nav-link" href="#"><i class="fas fa-trash"></i> Eliminar Registros</a>
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
			$data = json_decode(file_get_contents("http://localhost/evaluacion3ismc/RESTful/API/read.php"), true);
 		?>

	 	<div class="container-md">
			<table class="table table-striped table-dark">
			  <thead>
			    <tr>
			      <th>ID</th>
			      <th>Usuario</th>
			      <th>Nombre</th>
			      <th>Apellido</th>
			      <th>Pais</th>
			      <th>Estado</th>
			      <th>Tipo de Sangre</th>
			      <th>Contacto de Emergencia</th>
			      <th>Teléfono de Contacto de Emergencia</th>
			      <th>Enfermedad</th>
			      <th>Alergia</th>
			      <th>Fecha de Nacimiento</th>
			      <th>Vigencia</th>
			      <th>Eliminar</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			   
			     foreach($data as $mostrar) {
			      ?>
			   <tr>
			      <td><?php echo $mostrar['idUsuario']; ?></td>
			      <td><?php echo $mostrar['usuario']; ?></td>
			      <td><?php echo $mostrar['nombre']; ?> </td>
			      <td><?php echo $mostrar['apellido']; ?> </td>
			      <td><?php echo $mostrar['pais']; ?> </td>
			      <td><?php echo $mostrar['estado']; ?> </td>
			      <td><?php echo $mostrar['tipoSangre']; ?></td>
			      <td><?php echo $mostrar['contactoEm']; ?></td>
			      <td><?php echo $mostrar['telConEm']; ?></td>
			      <td><?php echo $mostrar['enfermedad']; ?></td>
			      <td><?php echo $mostrar['alergia']; ?></td>
			      <td><?php echo $mostrar['fechanac']; ?></td>
			      <td><?php echo $mostrar['vigencia']; ?></td>
			      <td> <a class="btn btn-primary" href="delete.php?idUsuario='<?php echo $mostrar['idUsuario'];?>'"><i class="fas fa-trash-alt"></i></a>

			   <?php  
			 }
			    ?>
			  </tbody>
			</table>

		</div>

	


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
	</html>