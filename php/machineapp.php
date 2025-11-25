<?php

include "conexion.php";

$id_user=$_GET['id_user'];

$datos=array();
$query = "SELECT * FROM `machines` WHERE `id_user`='$id_user'";
$resultado = mysqli_query($conexion,$query);
while($row= mysqli_fetch_object($resultado)){
    $datos[]=$row;
}
echo json_encode ($datos);
mysqli_close();
?>