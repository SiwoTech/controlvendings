<?php
include 'conexion.php';

$serial=$_GET['serial'];

$consulta="SELECT SUM(import) as 'total_cash' FROM cash WHERE serial ='$serial'";
$resultado=mysqli_query($conexion,$consulta);
$row ['total']= mysqli_fetch_assoc($resultado);
echo json_encode($row);
?>