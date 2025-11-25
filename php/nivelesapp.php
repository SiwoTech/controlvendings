<?php
include 'conexion.php';

$serial=$_GET['serial'];
$product=$_GET['product'];


$consulta="SELECT * FROM validates WHERE serial='$serial' and product='$product'";
/*$resultado=mysqli_query($conexion,$consulta);
$row ['total']= mysqli_fetch_assoc($resultado);
echo json_encode($row);*/

$query=mysqli_query($conexion,$consulta);
$resultado=mysqli_fetch_all($query, MYSQLI_ASSOC);
echo json_encode($resultado);
?>