

<?php 
		function conexion(){
			$servidor="localhost";
			$usuario="u826340212_vendingiot";
			$password="Cwo9982061148";
			$bd="u826340212_vendingiot";

			$conexion=mysqli_connect($servidor,$usuario,$password,$bd);

			return $conexion;
		}

 ?>