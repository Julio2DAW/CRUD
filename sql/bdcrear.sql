CREATE DATABASE bdempleados;

CREATE TABLE Empleados(
  idEmpleado tinyint UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  dni char(9) NOT NULL UNIQUE,
  nombre varchar(60) NOT NULL,
  correo varchar(100) NULL,
  telefono char(9) NOT NULL
)
