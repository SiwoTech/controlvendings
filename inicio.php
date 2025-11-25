<?php

	$user=$_GET['a'];
	$passw=$_GET['b'];

	
	if (!empty($user) || !empty($passw) ){
		
		$servername = "31.170.167.52";
		$database = "u826340212_vendingiot"; 
		$username = "u826340212_vendingiot";
		$password = "Cwo9982061148";
		$sql = "mysql:host=$servername;dbname=$database;";
		$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
		// Create a new connection to the MySQL database using PDO, $my_Db_Connection is an object
		try { 
			$my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);

		} catch (PDOException $error) {
			header("Location:  datas/errorcon/index.html");
			exit();
		}
		
		$sql = $my_Db_Connection->prepare('SELECT * FROM users WHERE email = :user');
		$sql->execute(array('user' => $user));
		$resultado = $sql->fetch(PDO::FETCH_NUM);
		$id = $resultado[0];
		$password = $resultado[1];
		$owner = $resultado[2];
		$company = $resultado[3];
		$email = $resultado[4];
		$lev = $resultado[5];
		$stat = $resultado[6];

       
    		if ($lev >= 5){
    			$param = "a=".$company."&b=".$owner."&c=".$lev."&d=".$stat."&e=".$id;
    		}else{
    			$param = "a=".$company."&b=".$owner."&c=".$lev."&d=".$stat."&e=".$id;
    		}
    		if (!empty($email)) {
    			if ($password == $passw){
    
    				header("Location: control.php?".$param);
    
    			}else {
    				header("Location: errorpass/index.html");
    			}
    		}else{
    			echo "No hay";
    			header("Location: erroruser/index.html");
    			exit();	
    		}
    
    
        				
    	}else{
    		header("Location:  datas/index.html");
    	}
    
	
?>