<!DOCTYPE html>
<!--Julio Antonio Ramos Gago-->
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name=author content=jramosgago.guadalupe@alumnado.fundacionloyola.net />
    <meta name=description content='Aplicacion Empleados' />
    <meta name=keywords content='Ejercicio php' />
    <title>Consultar</title>
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body>
    <h2>Consultar Empleados</h2>
    <?php
      require 'bd/configbd.php'; //Acceso a la base de datos.
      $conectar = new mysqli(HOSTNAME, USERNAME, PW, DB);
    ?>
    <div class="container-form form">
      <!--Filtrar Búsqueda-->
      <form action="consultar.php" method="post">
        <label for="dni">DNI</label><br />
        <input type="text" name="dni" id="dni"/><br />
        <select name="filtrado" id="filtrado">
          <option value="ASC">Nombre (A-Z)</option>
          <option value="DESC">Nombre (Z-A)</option>
        </select><br />
        <input type="submit" value="Mostrar"><br /><!--Búsqueda-->
        <!--Volver a la página de inicio-->
        <a href="index.html">Volver</a>
      </form>
    </div>
    <div class="center">
      <?php
        //Busqueda de empleados según su filtrado
        if($_POST){
          if(trim($_POST['dni'])=="")
            $consulta="SELECT * FROM empleados ORDER BY nombre ".$_POST['filtrado'].";";
          else
            $consulta="SELECT * FROM empleados WHERE dni LIKE '".$_POST['dni']."%' ORDER BY nombre ".$_POST['filtrado'].";";
          $resultado=$conectar->query($consulta);
          echo '<table>';
          while($fila=$resultado->fetch_assoc()){
            echo '<p> DNI: '.$fila['dni'].' -> Nombre: '.$fila['nombre'].'</p>';
            echo '<p><a href="borrar.php?id='.$fila['idEmpleado'].'">Borrar</a></p>';//Opción de borrar empleado
            echo '<p><a href="modificar.php?id='.$fila['idEmpleado'].'">Modificar</a></p>';//Opción de modificar empleado
          }
        }
      ?>
    </div>
  </body>
</html>
