<?php 

include("conectbd.php");

if (isset($_POST['register'])) {
    if (strlen($_POST['name']) >= 1 && strlen($_POST['surname']) >= 1 && strlen($_POST['rut']) >= 1 && strlen($_POST['add']) >= 1 && strlen($_POST['carr']) >= 1 && strlen($_POST['date']) >= 1) {
	    $name = trim($_POST['name']);
	    $surname = trim($_POST['surname']);
		$rut = trim($_POST['rut']);
		$add = trim($_POST['add']);
		$carr = trim($_POST['carr']);
		$date = trim($_POST['date']);
	    $consulta = "INSERT INTO `estudiantes`(`nombres`, `apellidos`, `rut`, `direccion`, `carrera`, `periodoac`) VALUES ('$name','$surname','$rut','$add','$carr','$date')";
	    $resultado = mysqli_query($conexion,$consulta);
	    if ($resultado) {
	    	?> 
	    	<h3 class="ok">¡Te has Registrado correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">¡ Ha ocurrido un error en el registro!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
           <?php
    }
}

?>