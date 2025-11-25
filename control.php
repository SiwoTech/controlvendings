<?php 
session_start();

$usuario = $_GET['b'];
$afiliado = $_GET['a'];
$level = $_GET['c'];
$stat = $_GET['d'];
$id_user = $_GET['e'];
$fecha = date("Y-m-d");
$fechaini = date("2024-01-01");

$_SESSION['usuario'] = $usuario;
$_SESSION['afiliado'] = $afiliado;
$_SESSION['level'] = $level;
$_SESSION['status'] = $stat;
$_SESSION['id_user'] = $id_user;
$_SESSION['fecha'] = $fecha;
$_SESSION['fecha1'] = $fechaini;

$aniofiltro = date("Y");
$longitud = strlen($aniofiltro);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Tabla dinámica</title>
    <link rel="stylesheet" href="librerias/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="librerias/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" href="librerias/select2/css/select2.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="librerias/jquery-3.2.1.min.js"></script>
    <script src="js/funciones.js"></script>
    <script src="librerias/bootstrap/js/bootstrap.js"></script>
    <script src="librerias/alertifyjs/alertify.js"></script>
    <script src="librerias/select2/js/select2.js"></script>
    <style>
        #tablaiot {
            width: 100%;
            height: 150px;
        }  
        
    </style>
</head>
<body>
    <div id="wb_header">
        <div id="header">
            <div class="col-1">
                <div id="wb_Image3" style="display:inline-block;width:100%;height:auto;z-index:0;"></div>
            </div>
            <div class="col-2">
                <div id="wb_headerMenu" style="display:inline-block;width:100%;z-index:1;">
                    <div id="headerMenu" class="headerMenu" style="width:100%;height:auto !important;">
                        <div class="container">
                            
                            <button class="btn btn-danger btn-lg" id="btn-success3" style="position:absolute; top:180%; left:85%; border-radius: 50px; z-index:35;">
                                <a href="https://cleanworkorange.com/qn/vending/datas/index.html">
                                    <div id="wb_txtsalir" style="color:white">Salir</div>
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <center>
        <div style="width:80%">
            <img src="images/myvendingorange.png" width="20%" class="lazyload"/>
            </br></br>
        </div>
    </center>
    
        <button class="btn btn-secondary btn-lg" id="btn-success2" style="position:block; left:10%; border-radius: 20px; z-index:35;">
            <a href="https://cleanworkorange.com/qn/vending/datas/app/MyVendingOrange.apk">
                <div id="wb_txtinfo">Descargar App</div>
            </a>
        </button>
     

   
        <button class="btn btn-secondary btn-lg" id="btn-success2" style="position:block; left:10%; border-radius: 20px; z-index:35;">
            <a href="https://cleanworkorange.com/qn/vending/datas/app/Vending_AppV1_Tiempos.apk">
                <div id="wb_txtinfo">Calibrador</div>
            </a>
        </button>
    
        <button class="btn btn-secondary btn-lg" id="btn-success2" style="position:block; left:75%; border-radius: 20px; z-index:35;">
            <a href="https://cleanworkorange.com/qn/vending/datas/pedidos/index.php">
                <div id="wb_txtinfo">Pedidos</div>
            </a>
        </button>
   
    <center>
        <div style="font-weight:bold; font-size:25px">Bienvenido <?php echo $usuario ?></div>
    </center>
    <center>
    <?php if ($level > 2) { ?>
        </br></br>
        <form class="form-inline" method="POST" action="">
            <label>Fecha Desde:</label>
            <input type="date" class="form-control" placeholder="Start" name="date1"/>
            <label>Hasta</label>
            <input type="date" class="form-control" placeholder="End" name="date2"/>
            <button class="btn btn-primary" name="search">
                <span class="glyphicon glyphicon-search"></span>
            </button> 
            <a href="control.php" type="button" class="btn btn-success">
                <span class="glyphicon glyphicon-refresh"></span>
            </a>
        </form>
        <div style="width:80%">   
            <?php include 'componentes/tablasp.php'; ?>    
        </div>    
    <?php } else { ?>    
        <div style="width:80%">   
            <?php include 'componentes/tabla.php'; ?>    
        </div>
    <?php } ?>

    <br>
    <div id="wb_footer">
        <div id="footer">
            <div class="row">
                <div id="wb_Text9">
                    <span style="color:#FFFFFF;">Copyright © 2023 Siwo Technologies. All Rights Reserved</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
    $('#tabla').load('componentes/tabla.php');
    $('#buscador').load('componentes/buscador.php');

    $('#guardarnuevo').click(function(){
        var id_user = $('#id').val();
        var name = $('#name').val();
        var master = $('#master').val();
        var ubica = $('#ubica').val();          

        agregardatos(id_user, name, master, ubica);
    });

    $('#actualizadatos').click(function(){
        actualizaDatos();
    });
});
</script>