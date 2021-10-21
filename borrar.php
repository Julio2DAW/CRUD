<!DOCTYPE html>
<!--Julio Antonio Ramos Gago-->
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name=author content=jramosgago.guadalupe@alumnado.fundacionloyola.net />
    <meta name=description content='Aplicacion Empleados' />
    <meta name=keywords content='Ejercicio php' />
    <title>Borrado</title>
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body>
    <h2>Borrar Empleados</h2>
    <?php
      require 'bd/configbd.php'; //Acceso a la base de datos.
      $conectar = new mysqli(HOSTNAME, USERNAME, PW, DB);
    ?>
    <div class="container-form">
      <form action="borrar.php" method="post">
        <?php
          if(!$_POST){
            $consulta="SELECT * FROM empleados WHERE idEmpleado='".$_GET['id']."';";
            $resultado=$conectar->query($consulta);
            $fila=$resultado->fetch_assoc();
            echo '<input type="hidden" name="id" value="'.$_GET['id'].'">';
            echo '<h3>¿Estás seguro de que deseas elminar a '.$fila['nombre'].' de DNI '.$fila['dni'].'?</h3>';//Avisar sobre a qué empleado se dispone a borrar
            echo '<input type="submit" value="Borrar"><br />';//Acción borrar* empleado y se mostrará un mensaje
            echo '<a href="consultar.php">Cancelar</a>';//CAncelar opción y volver atrás
          }
        ?>
      </form>
    </div>
    <div class="center">
      <!--Una vez que el usuario pulse borrar saltará el aiso de "Empleado borrado con éxito"-->
      <?php
        if($_POST){
          $consulta="DELETE FROM empleados WHERE idEmpleado='".$_POST['id']."';";
          $resultado=$conectar->query($consulta);
          echo '<h3>Empleado borrado con éxito</h3>';
          header("refresh:1;url=consultar.php");//Volver a la página anterior (consultar.php)
        }
      ?>
    </div>
  </body>
</html>
