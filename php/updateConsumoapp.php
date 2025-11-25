<?php
include 'conexion.php';

$serial=$_GET['serial'];
$product=$_GET['product'];

$query="UPDATE `validates` SET `count`='20' WHERE `serial`= '$serial' AND `product`='$product'";
$resultado=mysqli_query($conexion,$query);

if($resultado){
    echo "Actualización hecha";
}

?>