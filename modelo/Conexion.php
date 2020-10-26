
<?php


class Conexion
{

  function get_conexion()
  {

    try {

      $conexion = new PDO(
        //MySQL:
        "mysql:host=localhost;dbname=sunat", //


        "root", //usuario
        "", //contraseña
        array(
          PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" //ACTIVAR LA VALIDACIÓN DE CODIFICACIÓN UTF8
        )

      );
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //ACTIVSAR MENSAJES DE ERROR Y EXCEPCIÓN
      return $conexion; //RETONAR LA CONEXIÓN


    } catch (Exception $e) {

      echo "Error: " . $e->getMessage(); //SE IMPRIME LOS ERRORES EN PANTALLA
    }
  }
}


function conexion_mysql()
{
}

function conexion_sqlserver()
{
}


$conexion =  new Conexion();
$conexion =  $conexion->get_conexion();




?>
 