<?php 
	session_start();

	$id_user=$_POST['id_user'];

	$_SESSION['consulta']=$id_user;

	echo $id_user;

 ?>