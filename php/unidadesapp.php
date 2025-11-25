<?php
include 'conexion.php';

$id_user=$_GET['id_user'];

//Cotador de maquinas
$consulta_m="SELECT COUNT(masterkey) as 'machines' FROM machines WHERE id_user='$id_user'";
$resultado_m=mysqli_query($conexion,$consulta_m);
$data_m['total']=mysqli_fetch_assoc($resultado_m);
echo json_encode($data_m);

?>