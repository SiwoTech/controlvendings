<?php

include "conexion.php";

$id_user=$_GET['id_user'];

$result=array();
$result['datos']=array();
$query = "SELECT * FROM `machines` WHERE `id_user`='$id_user'";
$responce = mysqli_query($conexion,$query);
while($row= mysqli_fetch_array($responce)){
    $index['id']=$row['0'];
    $index['id_user']=$row['1'];
    $index['masterkey']=$row['2'];
    $index['location']=$row['3'];
    $index['date']=$row['4'];
    $index['serial']=$row['5'];
    $index['status']=$row['6'];
    array_push($result['datos'],$index);
}
//$result['exito']="1";
echo json_encode ($result);

?>