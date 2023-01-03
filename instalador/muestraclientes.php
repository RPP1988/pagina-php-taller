<?php
$host="localhost";
$usuario="root";
$contraseña="";
$bdato="nexcell";

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
  <meta charset="utf-8>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

  <link href="css/estilos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>
<body>
     <header>
            <div class="alert alert-info">
            <h2> Muestra de registros de clientes</h2>
            </div>
                  </header>
                  <section>
                    <table class="table">
                  <tr>
                    <th>id </th> 
                    <th>Nombre </th>
                    <th>apellido </th>
                    <th>rut </th>
                    <th>mail </th>
                    <th>credito </th>
                    <th>estado </th>
                    <th>saldo </th>                
                    
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
                  </section>
                  <footer>
                  </footer>
                            </body>
</html>

