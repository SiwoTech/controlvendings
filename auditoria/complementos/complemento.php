<?php 
session_start();

require "../db/conect.php";
$user=$_SESSION['usuario'];
$afil=$_SESSION['afiliado'];
$orden=$_SESSION['orden'];
$cat=$_SESSION['categoria'];
$tcat=$_SESSION['tipocat'];
$fecha=$_SESSION['fecha'];

?>

<!doctype html>
<html lang="es-mx">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<title>Complementos</title>
<meta name="keywords" content="Tecnologia, Aplicaciones, Paginas, Apps, Control, Hoteles, Residenciales, Ingreso, Temperatura, Escaner, Lector, QR">
<meta name="author" content="Siwo Technologies">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="Icon IntraP.fw.png" rel="icon" sizes="593x574" type="image/png">
<link href="Icon IntraP.fw.png" rel="icon" sizes="593x574" type="image/png">
<link href="Icon IntraP.fw.png" rel="icon" sizes="593x574" type="image/png">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="complemento.css" rel="stylesheet">
<link href="complemento.css" rel="stylesheet">
<script src="jquery-1.12.4.min.js"></script>
<script src="jquery.ui.effect.min.js"></script>
<script src="popper.min.js"></script>
<script src="util.min.js"></script>
<script src="collapse.min.js"></script>
<script src="dropdown.min.js"></script>
<script src="wwb17.min.js"></script>
<script>

 var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
    var f=new Date();
$(document).ready(function(){
        //user=$('#ebusuario').val();
        $('#tablac').load('../componentes/tablac.php');
});        

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
   $("a[href*='#LayoutGrid5']").click(function(event)
   {
      event.preventDefault();
      $('html, body').stop().animate({ scrollTop: $('#wb_LayoutGrid5').offset().top-88 }, 600, 'easeOutCirc');
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
</script>
</head>
<body >
    <div id="wb_header">
        <div id="header">
            <div class="row">
                <div class="col-1">
                    <div id="wb_Image2" style="display:inline-block;width:100%;height:auto;z-index:0;">
                        <img src="images/Logo IntraP.fw.png" id="Image2" alt="" width="242" height="114">
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
                    <img src="images/logo orange NUEVO.png" id="imgLogo" alt="" width="485" height="189">
                </div>
            </div>
            <div class="col-2">
                <div id="wb_Image1" style="display:inline-block;width:100%;height:auto;z-index:3;">
                    <img src="images/BannerIntraHoteles.fw.png" id="Image1" alt="" width="485" height="136">
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
                        <p style="font-family:Arial;font-size:13px;line-height:16px;"><span style="font-family:Verdana;font-size:15px;line-height:17.5px;font-weight:bold;">Usuario: <?php echo $user;?></span></p>
                    </div>
                </div>
                <div class="col-4">
                    <div id="wb_txtAfiliadoBanner">
                        <p style="font-family:Arial;font-size:13px;line-height:16px;"><span style="font-family:Verdana;font-size:15px;line-height:17.5px;font-weight:bold;">Afiliado a: <?php echo $afil;?></span></p>
                    </div>
                </div>
                <div class="col-5">
                    <div id="wb_txtNivelBanner">
                        <p style="font-family:Arial;font-size:13px;line-height:16px;"><span style="font-family:Verdana;font-size:15px;line-height:17.5px;font-weight:bold;">Cat: <?php echo $cat." ".$tcat;?></span></p>
                    </div>
                </div>
                <div class="col-6">
                </div>
            </div>
        </div>
    </div>
    <div id="wb_txtM2">
        <div id="txtM2">
            <div class="col-1">
                <div id="wb_txtInfo">
                    <p style="font-family:Arial;line-height:27.5px;"><span style="font-family:Verdana;font-weight:bold;">Carga complementaria de Información</span></p>
                </div>
            </div>
            <div class="col-2">
            </div>
            <div class="col-3">
            </div>
        </div>
    </div>
    <div id="wb_LayoutGrid4">
        <div id="LayoutGrid4-overlay">
        <div class="container">
                <div id="tablac"></div>
            </div>
        </div>
       
    </div>
    
    <div id="wb_LayoutGrid1">
        <div id="LayoutGrid1-overlay">
        </div>
        <div id="LayoutGrid1">
            <div class="col-1">
                <div class="col-1-padding">
                    <a id="btnGuardar" href="https://siwo-net.com/intra3p/index.php" style="display:inline-block;width:117px;height:25px;z-index:31;">Guardar</a>
                </div>
            </div>
            <div class="col-2">
                <div class="col-2-padding">
                </div>
            </div>
            <div class="col-3">
                <div class="col-3-padding">
                </div>
            </div>
            <div class="col-4">
                <div class="col-4-padding">
                </div>
            </div>
            <div class="col-5">
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
    <div id="StickyLayer" style="position:fixed;text-align:left;left:25px;top:auto;bottom:25px;width:50px;height:50px;z-index:43;">
        <div id="wb_up-arrow" style="position:absolute;left:9px;top:9px;width:24px;height:24px;text-align:center;z-index:32;">
            <a href="./complemento.php"><div id="up-arrow"><i class="fa fa-angle-up"></i></div></a>
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
    <div id="StickLayer2" style="position:fixed;text-align:left;left:auto;right:25px;top:auto;bottom:25px;width:50px;height:50px;z-index:45;">
        <div id="wb_Dowarrow" style="position:absolute;left:9px;top:8px;width:24px;height:24px;text-align:center;z-index:34;">
            <a href="./complemento.php"><div id="Dowarrow"><i class="fa fa-angle-down"></i></div></a>
        </div>
    </div>
    <div id="wb_Text25" style="position:absolute;left:84px;top:374px;width:131px;height:32px;z-index:46;">
        <span style="color:#000000;font-family:Verdana;font-size:13px;"><br></span>
    </div>
            
</body>
</html>