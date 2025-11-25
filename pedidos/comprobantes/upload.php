<?php
session_start();

error_reporting(0);
// Recibimos la informacion enviada por ajax
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];

	// el archivo se cargará en la siguiente carpeta
    // debe otorgar suficientes permisos de archivo
    $uploadDir = 'uploads/';

// nombre de archivo único generado
	$fileName = uniqid() . '_' . $file['name'];
   
    // mover el archivo cargado desde la ubicación temporal a nuestra ubicación de destino
    if (move_uploaded_file($file['tmp_name'], $uploadDir . $fileName)) {

        echo '<div class="alert alert-success" role="alert">El archivo ha subido correctamente.</div>';
       $_SESSION['file']=$fileName;
       
    } else {
        echo '<div class="alert alert-danger" role="alert">Fallo la carga de archivo.</div>';
    }
}
?>