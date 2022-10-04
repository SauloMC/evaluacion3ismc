<?php
	$data = json_decode(file_get_contents("http://localhost/evaluacion3ismc/RESTful/API/read.php"), true);
	print_r($data);
?>