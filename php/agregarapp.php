<?php
include 'conexion.php';

$id_user=$_POST['id_user'];
$serial=$_POST['serial'];
$masterkey=$_POST['masterkey'];
$location=$_POST['location'];
$date="2023-12-18 09:05:02";
$status="0";


$query ="INSERT INTO `machines`(`id_user`, `masterkey`, `location`, `date`,`serial`,`status`) VALUES  ('$id_user','$masterkey','$location','$date','$serial','$status')";
$resultado =mysqli_query($conexion,$query);

if($resultado){
$query_2="INSERT INTO `validates`(`id`, `masterkey`, `product`, `ability`, `consumeda`, `count`, `id_user`, `serial`) VALUES 
('','$masterkey','01','20','0','20','$id_user','$serial'), 
('','$masterkey','02','20','0','20','$id_user','$serial'), 
('','$masterkey','03','20','0','20','$id_user','$serial'),
('','$masterkey','04','20','0','20','$id_user','$serial'),
('','$masterkey','05','20','0','20','$id_user','$serial'),
('','$masterkey','06','20','0','20','$id_user','$serial'),
('','$masterkey','07','20','0','20','$id_user','$serial'),
('','$masterkey','08','20','0','20','$id_user','$serial'),
('','$masterkey','09','20','0','20','$id_user','$serial'),
('','$masterkey','10','20','0','20','$id_user','$serial')";
$res=mysqli_query($conexion,$query_2);
echo "Registro completo";
}
else{echo "Error";}
?>