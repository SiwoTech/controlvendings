<?php
include 'conexion.php';

$serial=$_GET['serial'];
$valor=$_GET['valor'];

if($valor==1){
    $query="UPDATE `machines` SET `status`='2' WHERE `serial`= '$serial'";
    $resultado=mysqli_query($conexion,$query);
    if($resultado){
        echo "Purgado iniciado";
    }
}else{
    $query="UPDATE `machines` SET `status`='0' WHERE `serial`= '$serial'";
    $resultado=mysqli_query($conexion,$query);
    if($resultado){
        echo "Iniciando ventas";
    }
}

?>