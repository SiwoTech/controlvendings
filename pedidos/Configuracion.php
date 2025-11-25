<?php
//DB details
$dbHost = '185.28.21.52';
$dbUsername = 'u826340212_vendingiot';
$dbPassword = 'Cwo9982061148';
$dbName = 'u826340212_vendingiot';

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("No hay Conexion con la base de datos: " . $db->connect_error);
} 
?>