<?php
include 'conexion.php';

$serial=$_GET['serial'];
$product=$_GET['product'];

//Suma del importe
$consulta_i="SELECT SUM(import) AS importe_producto FROM cash WHERE serial='$serial' and product='$product'";
$resultado_i=mysqli_query($conexion,$consulta_i);
$row ['total']= mysqli_fetch_assoc($resultado_i);
echo json_encode($row);

?>