<?php 
  session_start();

$usuario=$_GET['b'];
$afiliado=$_GET['a'];
$level=$_GET['c'];
$stat=$_GET['d'];
$id_user=$_GET['e'];

$_SESSION['usuario']=$usuario;
$_SESSION['afiliado']=$afiliado;
$_SESSION['level']=$level;
$_SESSION['status']=$stat;
$_SESSION['id_user']=$id_user;



 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Tabla dinamica</title>
        <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
        <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">
        <link rel="stylesheet" type="text/css" href="../librerias/select2/css/select2.css">

	    <script src="../librerias/jquery-3.2.1.min.js"></script>
        <script src="../js/funciones.js"></script>
	    <script src="../librerias/bootstrap/js/bootstrap.js"></script>
	    <script src="../librerias/alertifyjs/alertify.js"></script>
        <script src="../librerias/select2/js/select2.js"></script>
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
                <div id="wb_Image3" style="display:inline-block;width:100%;height:auto;z-index:0;">
                    
                </div>
            </div>
            <div class="col-2">
                <div id="wb_headerMenu" style="display:inline-block;width:100%;z-index:1;">
                    <div id="headerMenu" class="headerMenu" style="width:100%;height:auto !important;">
                        <div class="container">
                            <div class="navbar-header">
                                <button title="Hamburger Menu" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".headerMenu-navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	    <center>
			<div style="width:80%">
				<img  src="../images/myvendingorange.png" width="20%" class="lazyload"/>
				
				</br></br>
				<center><h1>Control de Pedidos</h1></center>
			</div>
	    </center>	    
			   
		<!--	<button class="btn btn-success btn-lg" id="btn-success2" data-toggle="modal" data-target="#modalNuevo" style="position:relative; left:10%; border-radius: 20px; z-index:35;">			
			    <div id="wb_txtinfo">Agregar Dispositivo</div>
		    </button>-->
			<center><div style="font-weight:bold; font-size:25px">Bienvenido <?php echo $usuario ?></div></center>
	    <center>
			<div style="width:80%">   
				<!--<div id="buscador"></div>-->
				<div id="tablac"></div>
			</div>
	    </center>	

	
	<!-- Modal para registros nuevos -->

        <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agrega Nuevo Dispositivo</h4>
              </div>
              <div class="modal-body">
                	<label>No. Cliente</label>
                	<input type="text" value="<?php echo $id_user?>" name="" id="id" class="form-control input-sm" disabled="true">
                  <label>Nombre Cliente</label>
                	<input type="text" value="<?php echo $usuario?>" name="" id="name" class="form-control input-sm" disabled="true">
                  <label>Master Key</label>
                	<input type="text" name="" id="master" class="form-control input-sm">
                  <label>Ubicación</label>
                	<input type="text" name="" id="ubica" class="form-control input-sm">
                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
                Agregar
                </button>
               
              </div>
            </div>
          </div>
        </div>

    <!-- Modal para edicion de datos -->

        <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
              </div>
              <div class="modal-body">
              		<input type="text" hidden="" id="idpersona" name="">
                	<label>Afiliado</label>
                	<input type="text" name="" id="afiliadou" class="form-control input-sm">
                  <label>Nombre Dev</label>
                	<input type="text" name="" id="devnameu" class="form-control input-sm">
                  <label>ID Dev</label>
                	<input type="text" name="" id="devidu" class="form-control input-sm">
                  <label>Tipo Dev</label>
                	<input type="text" name="" id="devtypeu" class="form-control input-sm">
                  <label>Ubicación</label>
                	<input type="text" name="" id="devposu" class="form-control input-sm">
        
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>
                
              </div>
            </div>
          </div>
        </div>
<div id="wb_footer">
            <div id="footer">
                <div class="row">
                    
                        <div id="wb_Text9">
                            <span style="color:#FFFFFF;">Copyright © 2023 Siwo Technologies.&nbsp; All Rights Reserved</span>
                        </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
      $('#tablac').load('../componentes/tablac.php');
      $('#buscador').load('componentes/buscador.php');
    });

    $(document).ready(function(){
        $('#guardarnuevo').click(function(){
          id_user=$('#id').val();
          name=$('#name').val();
          master=$('#master').val();
          ubica=$('#ubica').val();          

            agregardatos(id_user,name,master,ubica);
        });



        $('#actualizadatos').click(function(){
          actualizaDatos();
        });

    });
</script>