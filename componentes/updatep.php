<?php 
require "../db/conect.php";

$id = $_GET['id'];

mysqli_query($conn, "UPDATE contratos SET status=1 WHERE id='$id'");


            echo "<script>
                    alert('Servicio Completado con Exito....');
                    window.location='../../reports/print.php';        
                    
                </script>";

?>