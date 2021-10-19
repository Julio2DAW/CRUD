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
      <meta name=description content='Ejercicio 10' />
      <meta name=keywords content='Ejercicios JavaScript' />
      <title>CRUD-ALTA</title>
    </head>
    <body>
        <h2>Agregar Empleados</h2>
        <!--Formulario para añadir empleados.-->
        <form action="alta.php" method="post">
            <label for="dni">DNI</label><br/>
            <input type="text" name="dni" id="dni"/><br/>
            <label for="nombre">Nombre Completo*</label><br/>
            <input type="text" name="nombre" id="nombre"/><br/>
            <label for="correo">Correo Electrónico</label><br/>
            <input type="text" name="correo" id="correo"/><br/>
            <label for="telefono">Teléfono Personal*</label><br/>
            <input type="text" name="telefono" id="telefono"/><br/>
            <input type="submit" value="Agregar"/><!--Agregar empleado con una *consulta (insert into).-->
            <input type="reset" value="Borrar Datos"/><br/><!--Limpiar formulario si no queremos realizar la operación.-->
        </form>
        <!--Volver a la página de inicio-->
        <a href="index.html">Volver</a>
        <?php
            //Una vez envia los datos del formulario, se hará un insert into con esos datos.
            //Si estos datos son aceptados mostrará un *mensaje por pantalla de confirmación.
            if($_POST){
                //*consulta
                $consulta="INSERT INTO Empleados (dni, nombre, correo, telefono) VALUES ('".$_POST['dni']."', '".ucwords($_POST['nombre'])."', '".$_POST['correo']."', '".$_POST['telefono']."');";
                $resultado=$conectar->query($consulta);
                echo '<p>Empleado agregado correctamente</p>';//*mensaje
            }
        ?>
    </body>
</html>
