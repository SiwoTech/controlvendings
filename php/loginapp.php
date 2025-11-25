<?php
include 'conexion.php';

if(!$conexion){echo "Error en la conexión";}

$email=$_POST['email'];
$password=$_POST['password'];
//DATOS PRUEBA
//$email="valeria14cj@gmail.com";
//$password="vale123";

$sentencia=$conexion->prepare("SELECT * FROM users WHERE email=? AND password=?");
$sentencia->bind_param('ss',$email,$password);
$sentencia->execute();

$resultado=$sentencia->get_result();
if($fila=$resultado->fetch_assoc()){
    echo json_encode($fila,JSON_UNESCAPED_UNICODE);
}

$sentencia->close();
$conexion->close();
?>