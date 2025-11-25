<?php
include "conexion.php";

$email=$_GET['email'];

$consulta="SELECT * FROM users WHERE email='$email'";
$query=mysqli_query($conexion,$consulta);
$resultado=mysqli_fetch_all($query, MYSQLI_ASSOC);
echo json_encode($resultado);
?>
