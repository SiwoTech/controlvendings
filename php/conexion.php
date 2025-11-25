<?php 
define('DB_HOST', '31.170.167.52'); 
define('DB_USERNAME', 'u826340212_vendingiot'); 
define('DB_PASSWORD', 'Cwo9982061148');
define('DB_NAME', 'u826340212_vendingiot');

//http://www.example.com/gpsdata.php
//define('http://siwoiot.com/vending/litros.php', '9982061148');

date_default_timezone_set('North America/Mexico City');

// Connect with the database 
$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME); 

// Display error if failed to connect 
if ($db->connect_errno)
{ 
    echo "Error, no se econtro BD: ".$db->connect_error;
    exit();
}

$DB_HOST="31.170.167.52";
$DB_USERNAME="u826340212_vendingiot";
$DB_PASSWORD="Cwo9982061148";
$DB_NAME="u826340212_vendingiot";

$conexion = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

?>