<?php 
require "../db/conect.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM contratos WHERE id='$id'");


            echo "<script>
                    alert('Eliminado con Exito....');
                    window.location='../index.php';        
                    
                </script>";

?>