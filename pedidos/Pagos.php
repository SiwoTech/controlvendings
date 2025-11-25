<?php

$id_user=$_GET['a'];

// include database configuration file
include 'Configuracion.php';

// initializ shopping cart class
include 'La-carta.php';
$cart = new Cart;


// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: index.php");
}

// set customer ID in session
$_SESSION['sessCustomerID'] = $id_user;

// get customer details by session customer ID
$query = $db->query("SELECT * FROM users WHERE id = '$id_user'");
$custRow = $query->fetch_assoc();
$from=$custRow['email'];
$user=$custRow['owner'];
$tel=$custRow['phone'];
$direc=$custRow['address'];

$_SESSION['from']=$from;
$_SESSION['user']=$user;
$_SESSION['telefono']=$tel;
$_SESSION['direccion']=$direc;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pagos - Carrito de compras My Vending</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
   <script language="javascript" type="text/javascript">
    $(document).ready(function(){
        $('#cargac').load('comprobantes/index.php');
    });
    
   
    
</script>
    <style>
    .container{padding: 20px;}
    .table{width: 65%;float: left;}
    .shipAddr{width: 30%;float: left;margin-left: 30px;}
    .footBtn{width: 95%;float: left;}
    .orderBtn {float: right;}
    </style>
</head>
<body>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading"> 

<ul class="nav nav-pills">
  <li role="presentation"><a href="index.php">Inicio</a></li>
  <li role="presentation"><a href="VerCarta.php">Ver Carrito</a></li>
  <li role="presentation" class="active"><a href="Pagos.php">Pagos</a></li>
</ul>
</div>

<div class="panel-body">
    <h1>Vista previa de la Orden</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Sub total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]." ".$item["description"]; ?></td>
            <td><?php echo '$'.$item["price"].' MX'; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo '$'.$item["subtotal"].' MX'; ?></td>
        </tr>
        
        <?php 
        $_SESSION['producto']=$item['name']." ".$item['description'];} }else{ ?>
        
        
        <tr><td colspan="4"><p>No hay articulos en tu carta......</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '$'.$cart->total().' MX'; ?></strong></td>
            <?php } ?>
        
        </tr>
        
    </tfoot>
    </table>
    <div class="shipAddr">
        <h4>Detalles de envío</h4>
        <p><?php echo $custRow['owner']; ?></p>
        <p><?php echo $custRow['email']; ?></p>
        <p><?php echo $custRow['phone']; ?></p>
        <p><?php echo $custRow['address']; ?></p>
    </div>
    <label>Costo de Envio</label><input type="number" id="envio" value="0.00">
        
           <!-- <div class="card-header"> Carga de comprobante de pago </div>
            <div class="card-body">
                <p>Seleccione archivo PDF:</p>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="fileUpload" name="filename">
                    <label class="custom-file-label" for="customFile">Seleccione Archivo PDF</label>
                </div>
                <br>
                <br>
                <button class="btn btn-primary" onclick="uploadFile()">Cargar PDF</button>
                <div class="progress">
                    <div class="progress-bar" id="progressBar"></div>
                </div>
                <br>
                <div id="uploadStatus"></div>
                
            </div>-->
   
    <script>
        $(".custom-file-input").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script> 
    <script>
        function uploadFile() {
            var fileInput = document.getElementById('fileUpload');
            var file = fileInput.files[0];
    
            if (file) {
                var formData = new FormData();
                formData.append('file', file);
        
                var xhr = new XMLHttpRequest();
        
                xhr.upload.addEventListener('progress', function(event) {
                    if (event.lengthComputable) {
                        var percent = Math.round((event.loaded / event.total) * 100);
                        var progressBar = document.getElementById('progressBar');
                        progressBar.style.width = percent + '%';
                        progressBar.innerHTML = percent + '%';
                    }
                });
        
                xhr.addEventListener('load', function(event) {
                    var uploadStatus = document.getElementById('uploadStatus');
                    uploadStatus.innerHTML = event.target.responseText;
                   
                });
        
                xhr.open('POST', 'comprobantes/upload.php?id=<?php echo $item["id"]."&a=".$id_user?>', true);
                    xhr.send(formData);
              
            }
        }
    </script> 
            <?php
                $display="<script> document.write(display);</script>";
            ?>    
     
    <div class="footBtn">
        <a href="index.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Comprando</a>
        <a href="AccionCarta.php?action=placeOrder" class="btn btn-success orderBtn">Realizar pedido <i class="glyphicon glyphicon-menu-right"></i></a>
    </div>
   
        </div>
 <div class="panel-footer">SIWO Technologies</div>
 </div><!--Panek cierra-->
</div>
</body>
</html>