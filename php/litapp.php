<?php
include 'conexion.php';

$id_user=$_GET['id_user'];

//Suma de consumo
$consulta_c="SELECT SUM(consumed) as 'total_consumed' FROM products WHERE id_user='$id_user'";
$resultado_c=mysqli_query($conexion,$consulta_c);
$data_c['total']=mysqli_fetch_assoc($resultado_c);
echo json_encode($data_c);
?>