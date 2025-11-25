<?php
include 'conexion.php';

$serial=$_GET['serial'];

$datos=array();
$consulta="SELECT * FROM products WHERE serial ='$serial'";
$resultado=mysqli_query($conexion,$consulta);
while($row= mysqli_fetch_object($resultado)){
    $datos[]=$row;
}
echo json_encode($datos);
mysqli_close();
?>