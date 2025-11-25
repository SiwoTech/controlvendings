<?php


session_start();


$usuario=$_SESSION['usuario'];
$afiliado=$_SESSION['afiliado'];
$level=$_SESSION['level'];
$stat=$_SESSION['status'];
$id_user=$_SESSION['id_user'];

include 'Configuracion.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Pedidos Insumos My Vending</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 20px;}
    .cart-link{width: 100%;text-align: right;display: block;font-size: 22px;}
    </style>
</head>
</head>
<body>
<div class="header">
<div class="container">
<div class="panel panel-default">
<div class="panel-heading"> 

<ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="index.php">Inicio</a></li>
  <li role="presentation"><a href="VerCarta.php">Ver Carrito</a></li>
  <li role="presentation"><a href="Pagos.php">Pagos</a></li>
  <li role="presentation"><a href="../control.php?a=<?php echo $afiliado."&b=".$usuario."&c=".$level."&d=".$stat."&e=".$id_user; ?>">Regresar</a></li>
  
</ul>
</div>

<div class="panel-body">
    <h1>Mis Productos <?php $usuario?></h1>
    <a href="VerCarta.php" class="cart-link" title="Ver Carrito"><i class="glyphicon glyphicon-shopping-cart"></i></a>
    <div id="products" class="row list-group">
        <?php
        //get rows query
        $query = $db->query("SELECT * FROM mis_productos ORDER BY id ASC LIMIT 10");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>
        <div class="item col-lg-4">
            <div class="thumbnail">
                <div class="caption">
                    <h4 class="list-group-item-heading"><?php echo $row["name"]; ?></h4>
                    <p class="list-group-item-text"><?php echo $row["description"]; ?></p>
                   
                    <div class="row">
                        
                        <div class="col-md-6">
                            <p class="lead"><?php echo '$'.$row["price"].' MX'; ?></p>
                        </div>
                       
                        <div class="col-md-6">
                             <div style="width:100%">
				                <center><img  src="../images/bidon.png" width="60%" class="lazyload"/></center>
			                </div>
			                </br>
                            <a class="btn btn-success" href="AccionCarta.php?action=addToCart&id=<?php echo $row["id"]; ?>">Agregar a Carrito</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } }else{ ?>
        <p>Producto(s) no existe.....</p>
        <?php } ?>
    </div>
        </div>
 <div class="panel-footer">SIWO Technologies</div>
 </div><!--Panek cierra-->
 
</div>
</body>
</html>