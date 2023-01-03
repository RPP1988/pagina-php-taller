<?php
$host="localhost";
$usuario="root";
$contraseña="";
$bdato="nexcell";
//se agrega esta linea para revisar el historial de modificaciones//
$conexion=new mysqli($host, $usuario, $contraseña, $bdato);
if ($conexion -> connect_errno)
{   
       die("A Fallado La Conexion a la Base de Datos");

}
$clientes="SELECT * FROM clientes";
$resclientes=$conexion->query($clientes);



?>



<html lang="es">

<head>
  <title> Listado de Clientes </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

  <link href="css/estilos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
  <script>
			
    		$(function(){
				// Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
				$("#adicional").on('click', function(){
					$("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
				});
			 
				// Evento que selecciona la fila y la elimina 
				$(document).on("click",".eliminar",function(){
					var parent = $(this).parents().get(0);
					$(parent).remove();
				});
			});
		</script>
    


</head>
<body>
<body background="fond.jpg">
     <header>
            <div class="alert alert-info">
                              <h2> Listado de Clientes Registrados NEXCELL</h2>
            </div>
                  </header>
                  <section>
                    <table class="table">
                  <tr>
                    <th>Identificador </th> 
                    <th>Nombre </th>
                    <th>Apellido </th>
                    <th>Rut </th>
                    <th>Mail </th>
                    <th>Credito </th>
                    <th>Estado </th>
                    <th>Saldo </th>                
                    
                    </tr>
                    <?php
                       while ($registroclientes = $resclientes->fetch_array(MYSQLI_BOTH))
                   {   
                    echo '<tr>
                          <td>' .$registroclientes['id_cliente' ]. '</td>
                          <td>' .$registroclientes['Nom_cliente' ]. '</td>
                          <td>' .$registroclientes['apell_cliente' ]. '</td>
                          <td>' .$registroclientes['rut_cliente' ]. '</td>
                          <td>' .$registroclientes['mail_cliente' ]. '</td>
                          <td>' .$registroclientes['credito_cliente' ]. '</td>
                          <td>' .$registroclientes['estado_cliente' ]. '</td>
                          <td>' .$registroclientes['saldo_cliente' ]. '</td>
                          </tr>' ;
                              }
                              ?> 
                    </table>
                    <form method="post">
				<h3 class="bg-primary text-center pad-basic no-btm">Agregar Nuevo Cliente </h3>
				<table class="table bg-info"  id="tabla">
					<tr class="fila-fija">
						<td><input required name="idcliente[]" placeholder="ID Cliente"/></td>
						<td><input required name="nombre[]" placeholder="Nombre"/></td>
						<td><input required name="apellido[]" placeholder="Apellido"/></td>
						<td><input required name="rut[]" placeholder="Rut"/></td>
            <td><input required name="mail[]" placeholder="Mail"/></td>
            <td><input required name="credito[]" placeholder="Credito"/></td>
            <td><input required name="estado[]" placeholder="Estado"/></td>
            <td><input required name="saldo[]" placeholder="Saldo"/></td>
						<td class="eliminar"><input type="button"   value="Menos -"/></td>
					</tr>
				</table>

				<div class="btn-der">
					<input type="submit" name="insertar" value="Insertar Cliente" class="btn btn-info"/>
					<button id="adicional" name="adicional" type="button" class="btn btn-warning"> Más + </button>

				</div>
			</form>

      <?php

//////////////////////// PRESIONAR EL BOTÓN //////////////////////////
if(isset($_POST['insertar']))

{


$items1 = ($_POST['idcliente']);
$items2 = ($_POST['nombre']);
$items3 = ($_POST['apellido']);
$items4 = ($_POST['rut']);
$items5 = ($_POST['mail']);
$items6 = ($_POST['credito']);
$items7 = ($_POST['estado']);
$items8 = ($_POST['saldo']);
 
///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
while(true) {

    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
    $item1 = current($items1);
    $item2 = current($items2);
    $item3 = current($items3);
    $item4 = current($items4);
    $item5 = current($items5);
    $item6 = current($items6);
    $item7 = current($items7);
    $item8 = current($items8);
    
    ////// ASIGNARLOS A VARIABLES ///////////////////
    $id=(( $item1 !== false) ? $item1 : ", &nbsp;");
    $nom=(( $item2 !== false) ? $item2 : ", &nbsp;");
    $apell=(( $item3 !== false) ? $item3 : ", &nbsp;");
    $rut=(( $item4 !== false) ? $item4 : ", &nbsp;");
    $mail=(( $item5 !== false) ? $item5 : ", &nbsp;");
    $credi=(( $item6 !== false) ? $item6 : ", &nbsp;");
    $est=(( $item7 !== false) ? $item7 : ", &nbsp;");
    $sal=(( $item8 !== false) ? $item8 : ", &nbsp;");

    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
    $valores='('.$id.',"'.$nom.'","'.$apell.'","'.$rut.'","'.$mail.'","'.$credi.'","'.$est.'","'.$sal.'"),';

    //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
    $valoresQ= substr($valores, 0, -1);
    
    ///////// QUERY DE INSERCIÓN ////////////////////////////
    $sql = "INSERT INTO clientes (id_cliente, Nom_cliente, apell_cliente, rut_cliente, mail_cliente, credito_cliente, estado_cliente, saldo_cliente) 
  VALUES $valoresQ";

  
  $sqlRes=$conexion->query($sql) or $mysqli -> connect_error();

    
    // Up! Next Value
    $item1 = next( $items1 );
    $item2 = next( $items2 );
    $item3 = next( $items3 );
    $item4 = next( $items4 );
    $item5 = next( $items5 );
    $item6 = next( $items6 );
    $item7 = next( $items7 );
    $item8 = next( $items8 );
    
    // Check terminator
    if($item1 === false && $item2 === false && $item3 === false && $item4 === false && $item5 === false && $item6 === false && $item7 === false && $item8 === false) break;

}

}

?>






                  </section>
                  <footer>
                  </footer>
                            </body>
</html>

