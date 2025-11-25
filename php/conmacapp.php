<?php
include 'conexion.php';

$serial=$_GET['serial'];

//SUMA DE CONSUMO
$consulta_c="SELECT SUM(consumed) as 'total_consumed' FROM products WHERE serial='$serial'";
$resultado_c=mysqli_query($conexion,$consulta_c);
$data_c['total']=mysqli_fetch_assoc($resultado_c);
echo json_encode($data_c);
?>