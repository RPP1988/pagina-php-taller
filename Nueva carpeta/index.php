<!DOCTYPE html>
<html>
<head>
	<title>Registro De Estudiantes</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body background="fondo.jpg">
<body>
    <form method="post">
    	<h1>¡Registro de Estudiantes!</h1>
    	<input type="text" name="name" placeholder="Ingrese sus Nombres">
    	<input type="text" name="surname" placeholder="Ingrese Apellidos">
        <input type="text" name="rut" placeholder="Ingrese su Rut">
        <input type="text" name="add" placeholder="Ingrese su direccion">
        <select type="form-select" name="carr" placeholder="Selecciona Carrera">
                  <option selected>Selecciona Carrera</option>
                     <option value="Ingenieria Informatica">Ingenieria informatica</option>
                       <option value="Ingenieria Forestal">Ingenieria Forestal</option>
                         <option value="Ingenieria en Administracion">Ingenieria en administracion</option>
                           <option value="Ingenieria en Minas">Ingenieria en Minas</option>
                           <option value="Ingenieria en Redes">Ingenieria en Redes</option> 
                           <option value="Tecnico en Enfermeria">Tecnico en Enfermeria</option>   
                         </select>
             
        
        
        
        
			
			
        <input type="date" name="date" placeholder="Ingrese Periodo Academico">
    	<input type="submit" name="register">
      <input type="reset" name="reset">
      
      <a target="_blank" class="fcc-btn" href="https://www.unab.cl/">Visita UNAB para mas informacion</a>
  
    </form>
        <?php 
        include("registrar.php");
        ?>
</body>
</html>