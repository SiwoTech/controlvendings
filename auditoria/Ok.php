<?php
session_start();
$usuario=$_SESSION['usuario'];
?>

<!doctype html>
<html lang="es-mx">
<head>
<meta charset="utf-8">
<title>Envio correcto de email</title>
<link href="siwoico16x16.ico" rel="shortcut icon" type="image/x-icon">
<link href="siwoico32x32.fw.png" rel="icon" sizes="32x32" type="image/png">
<link href="siwoico64x64.fw.png" rel="icon" sizes="64x64" type="image/png">
<link href="siwocontact.css" rel="stylesheet">
<link href="Ok.css" rel="stylesheet">
</head>
<body>
   <div id="space"><br></div>
   <div id="container">
      <div id="wb_Image1" style="position:absolute;left:290px;top:152px;width:391px;height:293px;z-index:0;">
         <img src="image/Email Ok.fw.png" id="Image1" alt="">
      </div>
      <a id="Button1" href="./index.php?b=<?php echo $usuario?>" style="position:absolute;left:533px;top:381px;width:110px;height:37px;z-index:1;">Aceptar</a>
   </div>
</body>
</html>