<?php 
session_start();
require "../php/conexion2.php"; 
$conexion=conexion();

$usuario=$_GET['b'];
$afiliado=$_GET['a'];
$level=$_GET['c'];
$id_user=$_GET['e'];
$fecha= Date("Y-m-d H:i:s");
$orden=strtotime($fecha);


$_SESSION['usuario']=$usuario;
$_SESSION['afiliado']=$afiliado;
$_SESSION['level']=$level;

$_SESSION['id_user']=$id_user;
$_SESSION['orden']=$orden;

if ($resultc=mysqli_query($conexion,"SELECT * FROM users WHERE id='$id_user'")){
	while($verc=mysqli_fetch_row($resultc)){
		$id_user=$verc[0];
		$email=$verc[4];
		$stat=$verc[6];
	}	
}
function ValidateEmail($email)
{
   $pattern = '/^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i';
   return preg_match($pattern, $email);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formid']) && $_POST['formid'] == 'form1')
{
   $mailto = 'jdelbarrio@siwo-net.com';
   $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
   $subject = 'Solicitud de Pedido';
   $message = 'Formulario enviado desde Plataforma Vending';
   $success_url = './Ok.php';
   $error_url = './Error.html';
   $eol = "\n";
   $error = '';
   $internalfields = array ("submit", "reset", "send", "filesize", "formid", "captcha", "recaptcha_challenge_field", "recaptcha_response_field", "g-recaptcha-response", "h-recaptcha-response");
   $boundary = md5(uniqid(time()));
   $header  = 'From: '.$mailfrom.$eol;
   $header .= 'Reply-To: '.$mailfrom.$eol;
   $header .= 'MIME-Version: 1.0'.$eol;
   $header .= 'Content-Type: multipart/mixed; boundary="'.$boundary.'"'.$eol;
   $header .= 'X-Mailer: PHP v'.phpversion().$eol;
   try
   {
      if (!ValidateEmail($mailfrom))
      {
         $error .= "The specified email address (" . $mailfrom . ") is invalid!\n<br>";
         throw new Exception($error);
      }
      $message .= $eol;
      $message .= "IP Address : ";
      $message .= $_SERVER['REMOTE_ADDR'];
      $message .= $eol;
      foreach ($_POST as $key => $value)
      {
         if (!in_array(strtolower($key), $internalfields))
         {
            if (is_array($value))
            {
               $message .= ucwords(str_replace("_", " ", $key)) . " : " . implode(",", $value) . $eol;
            }
            else
            {
               $message .= ucwords(str_replace("_", " ", $key)) . " : " . $value . $eol;
            }
         }
      }
      $body  = 'This is a multi-part message in MIME format.'.$eol.$eol;
      $body .= '--'.$boundary.$eol;
      $body .= 'Content-Type: text/plain; charset=ISO-8859-1'.$eol;
      $body .= 'Content-Transfer-Encoding: 8bit'.$eol;
      $body .= $eol.stripslashes($message).$eol;
      if (!empty($_FILES))
      {
         foreach ($_FILES as $key => $value)
         {
             if ($_FILES[$key]['error'] == 0)
             {
                $body .= '--'.$boundary.$eol;
                $body .= 'Content-Type: '.$_FILES[$key]['type'].'; name='.$_FILES[$key]['name'].$eol;
                $body .= 'Content-Transfer-Encoding: base64'.$eol;
                $body .= 'Content-Disposition: attachment; filename='.$_FILES[$key]['name'].$eol;
                $body .= $eol.chunk_split(base64_encode(file_get_contents($_FILES[$key]['tmp_name']))).$eol;
             }
         }
      }
      $body .= '--'.$boundary.'--'.$eol;
      if ($mailto != '')
      {
         mail($mailto, $subject, $body, $header);
      }
      header('Location: '.$success_url);
   }
   catch (Exception $e)
   {
      $errorcode = file_get_contents($error_url);
      $replace = "##error##";
      $errorcode = str_replace($replace, $e->getMessage(), $errorcode);
      echo $errorcode;
   }
   exit;
}



     
?> 

<!doctype html>
<html lang="es-mx">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<title>Auditoria My Vending</title>
<meta name="keywords" content="Tecnologia, Aplicaciones, Paginas, Apps, Control, Hoteles, Residenciales, Ingreso, Temperatura, Escaner, Lector, QR">
<meta name="author" content="Siwo Technologies">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="siwoico16x16.ico" rel="shortcut icon" type="image/x-icon">
<link href="siwoico32x32.fw.png" rel="icon" sizes="32x32" type="image/png">
<link href="siwoico64x64.fw.png" rel="icon" sizes="64x64" type="image/png">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/pedidos.css" rel="stylesheet">
<link href="css/index.css" rel="stylesheet">
<script src="../librerias/jquery-3.2.1.min.js"></script>
<script src="../js/jquery.ui.effect.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/util.min.js"></script>
<script src="../js/collapse.min.js"></script>
<script src="../js/dropdown.min.js"></script>
<script src="../js/wwb17.min.js"></script>
<script language="javascript" type="text/javascript">
		
	function getParameterByName(name) {
		name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
		var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		results = regex.exec(location.search);
		return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	}	
    
    var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
    var f=new Date();
   
    $(document).ready(function(){
        $('#tabla').load('../componentes/tablap.php');
    });    
          
    
    
   

</script>
<script>
$(document).ready(function(){ 
    $('#btnCerrarC').click(function(){
        
        
        location.reload();
    });
});    
</script>        
<script>
$(document).ready(function(){
    $('#btnAgregar').click(function(){
        fechaA=$('#ebFecha').val();           
        cantidad=$('#ebCantidad').val();
        precio=$('#ebPrecio').val();
        orden=$('#ebOrden').val();		
		user=$('#ebId').val();
		total=cantidad*precio;
		clavep=$('#ebProdc').val();	
		
        cadena="&a=" + fechaA +
        "&b=" + user +               
        "&c=" + orden +
		"&d=" + cantidad +
        "&e=" + precio +        
        "&f=" + total+
		"&g=" + clavep;
		
        
       
        $.ajax({
            type:"POST",
            url:"../componentes/savedatap.php",
            async:true,
            data:cadena,
            success:function(r){
                alert ("Producto Agregado con Exito :)");
                $('#tabla').load('../componentes/tablap.php');
                cantidad=$('#ebCantidad').val('');
                precio=$('#ebPrecio').val('');
                subt=$('#ebSubtotal').val('');
                hotel=$('#cbxProducto').val('Seleccione');
            }
             
        });
    });   
    $("a[href*='#header']").click(function(event){
        event.preventDefault();
        $('html, body').stop().animate({ scrollTop: $('#wb_header').offset().top }, 600, 'easeOutCirc');
    });
    $('#headerMenu .dropdown-toggle').dropdown({popperConfig:{placement:'bottom-start',modifiers:{computeStyle:{gpuAcceleration:false}}}});
    $(document).on('click','.headerMenu-navbar-collapse.show',function(e){
        if ($(e.target).is('a') && ($(e.target).attr('class') != 'dropdown-toggle')){
            $(this).collapse('hide');
        }
    });
    $("a[href*='#home']").click(function(event){
        event.preventDefault();
        $('html, body').stop().animate({ scrollTop: $('#wb_home').offset().top-88 }, 600, 'easeOutCirc');
    });
    $("a[href*='#LayoutGrid4']").click(function(event){
        event.preventDefault();
        $('html, body').stop().animate({ scrollTop: $('#wb_LayoutGrid4').offset().top-88 }, 600, 'easeOutCirc');
    });
    $("a[href*='#LayoutGrid5']").click(function(event){
        event.preventDefault();
        $('html, body').stop().animate({ scrollTop: $('#wb_LayoutGrid5').offset().top-88 }, 600, 'easeOutCirc');
    });
    $("a[href*='#LayoutGrid1']").click(function(event){
        event.preventDefault();
        $('html, body').stop().animate({ scrollTop: $('#wb_LayoutGrid1').offset().top-88 }, 600, 'easeOutCirc');
    });
    SetStyle('Card1', 'initially-hidden');
    SetStyle('Card2', 'initially-hidden');
    SetStyle('Card3', 'initially-hidden');
    SetStyle('Card4', 'initially-hidden');
    SetStyle('Card5', 'initially-hidden');
    SetStyle('Card6', 'initially-hidden');
    SetStyle('portfolio-image1', 'initially-hidden');
    SetStyle('portfolio-image2', 'initially-hidden');
    SetStyle('about-text', 'initially-hidden');
    SetStyle('contact-text', 'initially-hidden');
    SetStyle('location-text', 'initially-hidden');
    SetStyle('service-text', 'initially-hidden');
    SetStyle('location-icon1', 'initially-hidden');
    SetStyle('location-icon2', 'initially-hidden');
    SetStyle('location-icon3', 'initially-hidden');
    SetStyle('location-icon4', 'initially-hidden');
    SetStyle('location-icon5', 'initially-hidden');
    SetStyle('JavaScript1', 'initially-hidden');
    var iOS = !!navigator.platform && /iPad|iPhone|iPod/.test(navigator.platform);
    if (iOS){
        $('#wb_nosotros').css('background-attachment', 'scroll');
    }
});
</script>
</head>
<body >
    <div id="wb_header">
        <div id="header">
            <div class="row">
                <div class="col-1">
                    <div id="wb_Image2" style="display:inline-block;width:100%;height:auto;z-index:0;">
                        <img src="../images/logosiwoiot.png" id="Image2" alt="" width="242" height="114">
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
                                <div class="headerMenu-navbar-collapse collapse">
                                    <ul class="nav navbar-nav">
                                        <!--<li class="nav-item">
                                            <a href="https://datastudio.google.com/reporting/72c6cd2b-46b8-45ab-9412-54abb9c9ea3a" target="_blank"class="nav-link">Reportes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="https://siwo-net.com/intra3p/ordenes/complementos/complemento.php" class="nav-link">Complemento</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="https://siwo-net.com/intra3p/reports/print.php" class="nav-link">Cerrar Servicios</a>
                                        </li>-->
                                        <li class="nav-item">
                                            <a href="https://cleanworkorange.com/qn/vending" class="nav-link">Salir</a>
                                        </li>
                                    
                                    
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="wb_home">
        <div id="home-overlay">
        </div>
        <div id="home">
            <div class="col-1">
                <div id="wb_imgLogo" style="display:inline-block;width:100%;height:auto;z-index:2;">
                    <img src="../images/MyVendingOrange.png" id="imgLogo" alt="" width="485" height="189">
                </div>
            </div>
            <div class="col-2">
                <div id="wb_Image1" style="display:inline-block;width:100%;height:auto;z-index:3;">
                    <img src="../images/BannerIntraHoteles.fw.png" id="Image1" alt="" width="485" height="136">
                </div>
            </div>
        </div>
    </div>

    <div id="wb_LayoutGrid2">
        <div id="LayoutGrid2">
            <div class="row">
                <div class="col-1">
                
                </div>    
                <div class="col-2">
                    <div id="wb_txtFechaBanner">
                        <p style="font-family:Arial;font-size:13px;line-height:16px;"><span style="font-family:Verdana;font-size:15px;line-height:17.5px;font-weight:bold;"><script> document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());</script></span></p>
						
					</div>
                </div>
                <div class="col-3">
                    <div id="wb_txtUserBanner">
                        <p style="font-family:Arial;font-size:13px;line-height:16px;"><span style="font-family:Verdana;font-size:15px;line-height:17.5px;font-weight:bold;">Usuario: <?php echo $usuario; ?></span></p>
                        <input type="hidden" id="ebUsuario" value="<?php echo $usuario;?>" disabled>
                    </div>
                </div>
                <div class="col-4">
                    <div id="wb_txtAfiliadoBanner">
                        <p style="font-family:Arial;font-size:13px;line-height:16px;"><span style="font-family:Verdana;font-size:15px;line-height:17.5px;font-weight:bold;">Afiliado a: <?php echo $afiliado; ?></span></p>
                        <input type="hidden" id="ebAfiliado" value="<?php echo $afiliado;?>" disabled>
                    </div>
                </div>
                <div class="col-5">
                    <div id="wb_txtNivelBanner">
                        <p style="font-family:Arial;font-size:13px;line-height:16px;"><span style="font-family:Verdana;font-size:15px;line-height:17.5px;font-weight:bold;">Cat: <?php echo $level; ?></span></p>
                    </div>
                    <div class="col-6">
                    </div>
                </div>
            </div>
        </div>
    </div>
   <form name="contact" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" id="Form1">
   <input type="hidden" name="formid" value="form1">
    <div id="wb_LayoutGrid6">
        <div id="LayoutGrid6">
            <div class="col-1">
                <div id="wb_txtInfo">
                    <p style="font-family:Arial;line-height:27.5px;"><span style="font-family:Verdana;font-weight:bold;">Venta de suministros My Vending</span></p>
                </div>
            </div>
            <div class="col-2">
            </div>
            <div class="col-3">
                <div id="wb_txtOrden">
                    <p style="font-family:Arial;font-size:13px;line-height:16px;"><span style="font-family:Verdana;font-size:15px;line-height:17.5px;font-weight:bold;">Pedido:</span></p>
                </div>
					<input type="text" id="ebOrden" style="display:block;width: 100%;height:26px;z-index:10;text-align:right; font-size:15px" name="Editbox1" value="<?php echo $orden;?>" spellcheck="false" disabled>
				</div>
    </div>
    <div id="wb_LayoutGrid4">
        <div id="LayoutGrid4-overlay">
        </div>
        
        <div id="LayoutGrid4">
            <div class="col-1">
                <div class="col-1-padding">
                    <div id="wb_txtCliente">
                        <p style="font-family:Arial;font-size:13px;line-height:16px;"><span style="font-family:Verdana;font-size:15px;line-height:17.5px;font-weight:bold;">Cliente:</span></p>
                    </div>
                
                    <input type="text" name="cbxCliente" size="1" id="cbxCliente" value="<?php echo $usuario ?>" style="display:block;width: 100%;height:28px;z-index:10;" disabled>
                    
                    
                </div>
            </div>
			<input type="text" style="display:none" type="hidden" id="ebFecha" value="<?php echo $fecha;?>">
			<input type="text" name="ebId" size="1" id="ebId" value="<?php echo $id_user ?>" style="display:none">                 
            <div class="col-2">
                <div class="col-2-padding">
                    <div id="wb_txtEmail">
                        <p style="font-family:Arial;font-size:13px;line-height:auto;"><span style="font-family:Verdana;font-size:15px;line-height:auto;font-weight:bold;">Email Contacto:</span></p>
                    </div>                  
                
					<input type="email" id="ebEmail" size="1" style="display:block;width: 100%;height:30px;z-index:12;" name="ebEmail" value="<?php echo $email ?>" disabled>
                </div>
            </div>
			<input type="email" id="ebId" style="display:none;" name="ebId" value="" spellcheck="false" onclick="javascript:validarconta()" disabled >
			
			
			
			
                       
        </div>
    </div>
    </form>
    <div id="wb_LayoutGrid5">
        <div id="LayoutGrid5-overlay">
        </div>
        <div id="LayoutGrid5">
            <div class="col-1">
                <div class="col-1-padding">
                    <div id="wb_txtCodHotel">
                        <p style="font-family:Arial;font-size:13px;line-height:16px;"><span style="font-family:Verdana;font-size:15px;line-height:17.5px;font-weight:bold;">Producto:</span></span></p>
                    </div>
                    
                    <select name="cbxProducto" size="1" id="cbxProducto" onchange="ShowSelected2();" style="display:block;width: 100%;height:28px;z-index:10;">
                        <option value="Seleccione">Seleccione:</option>
                        <?php 
                        $result2 = mysqli_query($conexion,"SELECT * FROM producsdata ORDER BY id");
                        while ($r2 = mysqli_fetch_array($result2)){
                            echo '<option value="'.$r2[4]."|".$r2[2].'" >'.$r2[1].'</option>';
                        }
						?>
                    </select>
                    
                    <script type"text/javascript">
                        
                        function ShowSelected2(){
                            var precio=document.getElementById('cbxProducto').value;
                           	
							var pro=precio.slice(-2);
							var pre=precio.slice(-10,-3);
							document.getElementById('ebProdc').value = pro;
							document.getElementById('ebPrecio').value = pre;				
						}
						
                            
						
							
						
                        
                    </script>             
                                   
                </div>
            </div>         
			
			<input type="double" id="ebProdc" style="display:none;width: 100%;height:26px;z-index:20; text-align:right;" name="ebProdc" value="" spellcheck="false" onchage="oper();" onkeyup="oper()">  
			
			<div class="col-2">
                <div class="col-2-adding">
                    <div id="wb_txtCantidad">
                        <p style="font-family:Arial;font-size:13px;line-height:16px;"><span style="font-family:Verdana;font-size:15px;line-height:17.5px;font-weight:bold;">Cantidad</span></p>
                    </div>
                    <input type="number" id="ebCantidad" style="display:block;width: 100%;height:26px;z-index:18; text-align:right;" name="ebCantidad" value="" spellcheck="false" onchage="oper();" onkeyup="oper();" min="0">                
				</div>
            </div>
            <div class="col-3">
                <div class="col-3-padding">
                    <div id="wb_txtPrecio">
                        <p style="font-family:Arial;font-size:13px;line-height:16px;"><span style="font-family:Verdana;font-size:15px;line-height:17.5px;font-weight:bold;">Precio</span></p>
                    </div>
                    <input type="double" id="ebPrecio" style="display:block;width: 100%;height:26px;z-index:20; text-align:right;" name="ebPrecio" value="" spellcheck="false" onchage="oper();" onkeyup="oper();" min="0" step=".01" required disabled>
                </div>
            </div>
            <div class="col-4">
                <div id="wb_txtSubtotal">
                    <p style="font-family:Arial;font-size:13px;line-height:16px;"><span style="font-family:Verdana;font-size:15px;line-height:17.5px;font-weight:bold;">Subtotal</span></p>
                </div>
                <script type"text/javascript">
                    function oper(){
                        var cant, prec, total;
						cant = document.getElementById('ebCantidad').value;
                        prec = document.getElementById('ebPrecio').value;
                        if (isNaN(cant) || isNaN(prec)){
							total=0.00;
						}else{	
						multi = parseFloat(cant) * parseFloat(prec);
						total=multi;
						document.getElementById('ebSubtotal').innerHTML = "$ "+total;
						}	
					}
                </script>
                
				<p style="display:block;width: 100%;height:26px;z-index:22;text-align:right;" id="ebSubtotal"></p>
				<!--<input align="right" type="number" id="ebSubtotal" style="display:block;width: 100%;height:26px;z-index:22;text-align:right;" name="ebSubtotal" value="0.00" spellcheck="false" disabled>-->
                
            </div>
        </div>
    </div>
    </form>
    <div id="wb_LayoutGrid1">
        <div id="LayoutGrid1-overlay">
            <div class="container">
                <div id="tabla"></div>
                
            </div>
        </div>
        <div id="wb_LayoutGrid1">
            <div id="LayoutGrid1-overlay">
            </div>
            <div id="LayoutGrid1">
                <div class="col-1">
                    <div class="col-1-padding">
                        <input type="submit" id="Button1" name="" value="Enviar Pedido" style="display:inline-block;width:117px;height:25px;z-index:29">
                    </div>
                </div>
                <div class="col-2">
                    <div class="col-2-padding">                        
                        <a class="ui-button ui-widget ui-corner-all" id="btnAgregar" style="display:inline-block;width:126px;height:27px;z-index:30;">Agregar Producto</a>
						
                    </div>
                </div>
                <div class="col-3">
                    <div class="col-3-padding">
                        <div id="wb_txtTotalServ">
                            
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="col-4-padding">
                       
                    </div>
                </div>
                <div class="col-5">
                    <div id="wb_txtImpTotal">
                       
                    </div>
                    
                </div>
                <div class="col-6">
                    
                </div>
            </div>
        </div>
        <div id="wb_nosotros">
            <div id="nosotros-overlay">
            </div>
            <div id="nosotros">
                <div class="row">
                    <div class="col-1">
                    
                    </div>
                </div>
            </div>
        </div>
        <div id="StickyLayer" style="position:fixed;text-align:left;left:25px;top:auto;bottom:25px;width:50px;height:50px;z-index:38;">
            <div id="wb_up-arrow" style="position:absolute;left:9px;top:9px;width:24px;height:24px;text-align:center;z-index:27;">
                <a href="./index.php"><div id="up-arrow"><i class="fa fa-angle-up"></i></div></a>
            </div>
        </div>
        <div id="wb_footer">
            <div id="footer">
                <div class="row">
                    <div class="col-1">
                        <div id="wb_Text9">
                            <span style="color:#FFFFFF;">Copyright © 2018 Siwo Technologies.&nbsp; All Rights Reserved</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="StickLayer2" style="position:fixed;text-align:left;left:auto;right:25px;top:auto;bottom:25px;width:50px;height:50px;z-index:40;">
            <div id="wb_Dowarrow" style="position:absolute;left:9px;top:8px;width:24px;height:24px;text-align:center;z-index:29;">
                   <a href="./index.php"><div id="Dowarrow"><i class="fa fa-angle-down"></i></div></a> 
            </div>
        </div>
        <div id="wb_Text25" style="position:absolute;left:84px;top:374px;width:131px;height:32px;z-index:41;">
            <span style="color:#000000;font-family:Verdana;font-size:13px;"><br></span>
        </div>
    </div>








</body>
</html>