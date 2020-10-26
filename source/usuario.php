<?php

include'../modelo/Conexion.php';

$conexion = new Conexion();
$conexion = $conexion->get_conexion();
$opcion = $_REQUEST['op'];



switch($opcion){

    case 1:

     try {
         $query = "SELECT * FROM user";
         $statement = $conexion->prepare($query);
         $statement->execute();
         $result  = $statement->fetchAll(PDO::FETCH_ASSOC);
         $json = [
           "sEcho"=>1,
           "iTotalRecords"=>count($result),
           "iTotalDisplayRecords"=>count($result),
           "aaData"=>$result
         ];

         echo json_encode($json);

     } catch (\Exception $e) {
         echo "error".$e->getMessage();
     }

    break;

case 3:
$id = trim($_REQUEST['id']);
try {
  $query = "SELECT * FROM user WHERE id=:id";
  $statement = $conexion->prepare($query);
  $statement->bindParam(":id",$id);
  $statement->execute();
  $result  = $statement->fetch(PDO::FETCH_ASSOC);
  echo json_encode($result);
} catch (\Exception $e) {

}


break;
}




?>
