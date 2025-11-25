<?php
include 'conexion.php';

$serial=$_GET['serial'];

$datos=array();
$consulta="SELECT product,SUM(import)AS importeTotal FROM cash WHERE serial ='$serial' GROUP BY product";
$resultado=mysqli_query($conexion,$consulta);
while($row= mysqli_fetch_object($resultado)){
    $datos[]=$row;
}
echo json_encode($datos);
mysqli_close();
?>