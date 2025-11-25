<?php
include 'conexion.php';

$id_user=$_GET['id_user'];

//Suma del importe
$consulta_i="SELECT SUM(import) as 'total_cash' FROM cash WHERE id_user='$id_user'";
$resultado_i=mysqli_query($conexion,$consulta_i);
$row ['total']= mysqli_fetch_assoc($resultado_i);
echo json_encode($row);

/*$consulta_i="SELECT SUM(import) as 'total_cash' FROM cash WHERE id_user='$id_user'";
$resultado_i=mysqli_query($conexion,$consulta_i);
if(empty($resultado_i)==FALSE){
    $row ['total']= mysqli_fetch_assoc($resultado_i);
    echo json_encode($row);
}else{
    if()
    $consulta  ['total_cash']=0;
    $rowi ['total']= $consulta;
    echo json_encode($rowi);
}*/

?>