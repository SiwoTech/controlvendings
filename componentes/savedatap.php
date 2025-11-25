<?php
   require "../../../php/conexion2.php";
   
    /*$fecha=$_GET[a];
    $codhotel=$_GET[b];
    $email=$_GET[c];
    $orden=$_GET[d];
    $servicio=$_GET[e];
    $cantidad=$_GET[f];
    $precio=$_GET[g];
    $contacto=$_GET[h];
    $usuario=$_GET[i];
    $afiliado=$_GET[j];
    
    */
    $fecha=$_POST[a];
    $id_user=$_POST[b];
    $email=$_POST[c];
    $orden=$_POST[d];    
    $cantidad=$_POST[e];
    $precio=$_POST[f];    
    $total=$_POST[g];
   
   
   /*if ($tipo="1"){
       $tipon="Estandar";
   }else if ($tipo="2"){
       $tipon="Sanitización";
   }else if ($tipo="3"){
       $tipon="Mobiliario";
   }else if ($tipo="4"){
       $tipon="Especial";
   }*/
   
    //Check connection
?>    
<script src="../jquery-1.12.4.min.js"></script>
<script src="../jquery.ui.effect.min.js"></script>
<script src="../popper.min.js"></script>
<script src="../util.min.js"></script>
<script src="../collapse.min.js"></script>
<script src="../dropdown.min.js"></script>
<script src="../wwb17.min.js"></script>

    
<?php 
    if (!$conn) {
        die("Conección Fallo: " . mysqli_connect_error());
    }
            $sql = "INSERT INTO sales (id_user, order, date, amount, price, total) VALUES ('$id_user', '$orden', '$fecha', '$cantidad', '$precio', '$total')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>
                    alert('Agregado con Exito....');
                    window.location='index.php';        
                    
                </script>";
               
        }   
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        } 
        
    mysqli_close($conn);   
?>