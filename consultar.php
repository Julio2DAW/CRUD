<?php
    require 'bd/configuracion.php'; //Acceso a la base de datos.
    $conectar = new mysqli(HOSTNAME, USERNAME, PW, DB);
?>
<!DOCTYPE html>
<!--Julio Antonio Ramos Gago-->
<html lang="es">
    <head>
      <meta charset="UTF-8" />
      <meta name=author content=jramosgago.guadalupe@alumnado.fundacionloyola.net />
      <meta name=description content='Aplicacion Empleados' />
      <meta name=keywords content='Ejercicio php' />
      <title>CRUD-CONSULTAR</title>
    </head>
    <body>
        <h2>Consultar Empleados</h2>
        <!--Filtrar Búsqueda-->
        <form action="consultar.php" method="post">
            <label for="dni">DNI</label><br/>
            <input type="text" name="dni" id="dni"/>
            <select name="filtrado" id="filtrado">
                <option value="ASC">Nombre (A-Z)</option>
                <option value="DESC">Nombre (Z-A)</option>
            </select>
            <input type="submit" value="Mostrar"><!--Ejecutar la búsqueda-->
        </form>
        <!--Volver a la página de inicio-->
        <a href="index.html">Volver</a>
        
    </body>
</html>
