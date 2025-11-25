
<?php
session_start();
require_once "../php/conexion2.php";
	$conexion=conexion();
unset($_SESSION['consulta']);
$fecha= Date("Y-m-d H:i:s");
$masterk=$_GET['mk'];

$_SESSION['master']=$masterk;
$user=$_SESSION['usuario'];
$afil=$_SESSION['afiliado'];
$cat=$_SESSION['level'];
$id=$_SESSION['id_user'];



?>
<!doctype html>
<html lang="es-mx">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<title>MyVendingOrange</title>
<meta name="keywords" content="Tecnologia, Aplicaciones, Paginas, Apps, Control, Hoteles, Residenciales, Ingreso, Temperatura, Escaner, Lector, QR">
<meta name="author" content="Siwo Technologies">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="Icon IntraP.fw.png" rel="icon" sizes="593x574" type="image/png">
<link href="Icon IntraP.fw.png" rel="icon" sizes="593x574" type="image/png">
<link href="Icon IntraP.fw.png" rel="icon" sizes="593x574" type="image/png">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="Reportes_Hoteleria.css" rel="stylesheet">
<link href="index.css" rel="stylesheet">
<script src="../librerias/jquery-3.2.1.min.js"></script>
<script src="../js/funciones2.js"></script>
<script src="../librerias/bootstrap/js/bootstrap.js"></script>
<script src="../librerias/alertifyjs/alertify.js"></script>
<script src="../librerias/select2/js/select2.js"></script>
<script src="../js/jquery-1.12.4.min.js"></script>
<script src="../js/jquery.ui.effect.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/util.min.js"></script>
<script src="../js/collapse.min.js"></script>
<script src="../js/dropdown.min.js"></script>
<script src="../jswwb17.min.js"></script>
<script>
$(document).ready(function()
{
   $("a[href*='#header']").click(function(event)
   {
      event.preventDefault();
      $('html, body').stop().animate({ scrollTop: $('#wb_header').offset().top }, 600, 'easeOutCirc');
   });
   $('#headerMenu .dropdown-toggle').dropdown({popperConfig:{placement:'bottom-start',modifiers:{computeStyle:{gpuAcceleration:false}}}});
   $(document).on('click','.headerMenu-navbar-collapse.show',function(e)
   {
      if ($(e.target).is('a') && ($(e.target).attr('class') != 'dropdown-toggle')) 
      {
         $(this).collapse('hide');
      }
   });
   $("a[href*='#home']").click(function(event)
   {
      event.preventDefault();
      $('html, body').stop().animate({ scrollTop: $('#wb_home').offset().top-88 }, 600, 'easeOutCirc');
   });
   $("a[href*='#LayoutGrid4']").click(function(event)
   {
      event.preventDefault();
      $('html, body').stop().animate({ scrollTop: $('#wb_LayoutGrid4').offset().top-88 }, 600, 'easeOutCirc');
   });
   $("a[href*='#LayoutGrid3']").click(function(event)
   {
      event.preventDefault();
      $('html, body').stop().animate({ scrollTop: $('#wb_LayoutGrid3').offset().top-88 }, 600, 'easeOutCirc');
   });
   $("a[href*='#LayoutGrid7']").click(function(event)
   {
      event.preventDefault();
      $('html, body').stop().animate({ scrollTop: $('#wb_LayoutGrid7').offset().top-88 }, 600, 'easeOutCirc');
   });
   $("a[href*='#LayoutGrid1']").click(function(event)
   {
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
   if (iOS)
   {
      $('#wb_nosotros').css('background-attachment', 'scroll');
   }
});
			
	function getParameterByName(name) {
		name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
		var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		results = regex.exec(location.search);
		return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	}	
		
	var afiliado = getParameterByName('a');
	var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
    var f=new Date();
   
    $(document).ready(function(){        
		$('#index').load('buscador/index.php');
    });	
	
		 
</script>

</head>
<body >
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
                            <div class="headerMenu-navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li class="nav-item">
                                        
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://siwoiot.com/vending" class="nav-link">Salir</a>
                                    </li>
                                </ul>
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
                    <div id="wb_Image2" style="display:inline-block;width:30%;height:auto;z-index:2;">
                        <img src="../images/myvendingorange.png" id="Image2" alt="" width="585" height="585">
                    </div>
                </div>
                <div class="col-2">
                    <div id="wb_Image1" style="display:inline-block;width:100%;height:auto;z-index:3;">
                        <img src="images/BannerIntraHoteles.fw.png" id="Image1" alt="" width="100%" height="auto">
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
                            <p style="font-family:Arial;font-size:13px;line-height:16px;"><span style="font-family:Verdana;font-size:13px;line-height:17.5px;font-weight:bold;"><script>document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());</script></span></p>
                        </div>
                    </div>
                    <!--<div class="col-3">
                        <div id="wb_txtUserBanner">
                            <p style="font-family:Arial;font-size:13px;line-height:16px;"><span style="font-family:Verdana;font-size:13px;line-height:17.5px;font-weight:bold;">Usuario: <?php echo $user; ?></span></p>
							<input type="hidden" id="ebUsuario" value="<?php echo $user;?>" disabled>
						</div>
                    </div>
                    <div class="col-4">
                        <div id="wb_txtAfiliadoBanner">
                            <p style="font-family:Arial;font-size:13px;line-height:16px;"><span style="font-family:Verdana;font-size:13px;line-height:17.5px;font-weight:bold;">Empresa a: <?php echo $afil; ?></span></p>
                        </div>
                    </div>
                    <div class="col-5">
                        <div id="wb_txtNivelBanner">
                            <p style="font-family:Arial;font-size:13px;line-height:16px;"><span style="font-family:Verdana;font-size:13px;line-height:17.5px;font-weight:bold;">Nivel: <?php echo $cat." ".$tcat; ?></span></p>
                        </div>
                    </div>-->  
                    
                </div>
            </div>
        </div>         
		
		<div class="container">
			<div id="index"></div>                  
        </div>
	             
        
        <div id="StickyLayer" style="position:fixed;text-align:left;left:25px;top:auto;bottom:25px;width:50px;height:50px;z-index:26;">
            <div id="wb_up-arrow" style="position:absolute;left:9px;top:9px;width:24px;height:24px;text-align:center;z-index:15;">
                <a href="./index.php"><div id="up-arrow"><i class="fa fa-angle-up"></i></div></a>
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
        <div id="StickLayer2" style="position:fixed;text-align:left;left:auto;right:25px;top:auto;bottom:25px;width:50px;height:50px;z-index:28;">
            <div id="wb_Dowarrow" style="position:absolute;left:9px;top:8px;width:24px;height:24px;text-align:center;z-index:17;">
                <a href="./index.php"><div id="Dowarrow"><i class="fa fa-angle-down"></i></div></a>
            </div>
        </div>
        
</body>
</html>