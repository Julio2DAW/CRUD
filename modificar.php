<!DOCTYPE html>
<!--Julio Antonio Ramos Gago-->
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name=author content=jramosgago.guadalupe@alumnado.fundacionloyola.net />
    <meta name=description content='Aplicacion Empleados' />
    <meta name=keywords content='Ejercicio php' />
    <title>Modificar</title>
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body>
    <h2>Modificar Empleados</h2>
    <?php
      require 'bd/configbd.php'; //Acceso a la base de datos.
      $conectar = new mysqli(HOSTNAME, USERNAME, PW, DB);
    ?>
    <div class="container-form">
      <!--Formulario para editar-->
      <form action="modificar.php" method="post">
        <?php
          if(!$_POST){
            $consulta="SELECT * FROM empleados WHERE idEmpleado='".$_GET['id']."';";
            $resultado=$conectar->query($consulta);
            $fila=$resultado->fetch_assoc();
            echo '<input type="hidden" name="id" value="'.$_GET['id'].'"/>';
            echo '<label for="dni">DNI</label><br />';
            echo '<input type="text" name="dni" id="dni" value="'.$fila['dni'].'"/><br />';
            echo '<label for="nombre">Nombre</label><br />';
            echo '<input type="text" name="nombre" id="nombre" value="'.$fila['nombre'].'"/><br />';
            echo '<label for="correo">Correo Electrónico</label><br />';
            echo '<input type="text" name="correo" id="correo" value="'.$fila['correo'].'"/><br />';
            echo '<label for="telefono">Teléfono Personal </label><br />';
            echo '<input type="text" name="telefono" id="telefono" value="'.$fila['telefono'].'"/><br />';
            echo '<input type="submit" value="Editar"><br />';//Editar empleado
            echo '<a href="consultar.php">Cancelar</a>';//Cancelar opción
          }
        ?>
      </form>
      <?php
        //Una vez pulsado Editar, nos mostrará un mensaje por pantalla y volveremos a la página anterior
        if($_POST){
          $consulta="UPDATE empleados SET nombre='".$_POST['nombre']."', correo='".$_POST['correo']."', telefono='".$_POST['telefono']."' WHERE idEmpleado='".$_POST['id']."';";
          $resultado=$conectar->query($consulta);
          echo '<h3>Empleado modificado con éxito</h3>';
          header("refresh:1;url=consultar.php");//Volver a la página anterior (consultar.php)
        }
      ?>
    </div>
  </body>
</html>
