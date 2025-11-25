<?php 

	require_once "conexion2.php";
	$conexion=conexion();

	$id=$_POST['id'];
	$no=$_POST['name'];
	$cd=$_POST['master'];
	$te=$_POST['ubica'];
	
	$sql="INSERT into machines (id_user,masterkey,location)
								values ('$id','$cd','$te')";
								
	$sql1="INSERT into validates (masterkey,product,ability,consumeda,count)
								values ('$cd',01,20,0,20)";
	
	echo $result=mysqli_query($conexion,$sql);

 ?>