<?php 

require 'conexion.php';
date_default_timezone_set('America/Cancun');
$fecha = date('Y-m-d H:i:s');
//----------------------------------------------------------------------------

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    
	    $masterk1 = escape_data($_POST["masterkey"]);
		$pd = escape_data($_POST["idproducto"]);
		$consum = escape_data($_POST["litrosP"]);
		$cash1 = escape_data($_POST["saldo"]);
        $masterk = str_replace(':','',$masterk1);
        
        if ($masterk=="F024F9599648"){
            if ($pd=="01"){
                $cash1=12;
            }
             if ($pd=="02"){
                $cash1=20;
            }
             if ($pd=="03"){
                $cash1=20;
            }
             if ($pd=="04"){
                $cash1=25;
            }
             if ($pd=="05"){
                $cash1=22;
            }
             if ($pd=="06"){
                $cash1=20;
            }
             if ($pd=="07"){
                $cash1=20;
            }
             if ($pd=="08"){
                $cash1=22;
            }
             if ($pd=="09"){
                $cash1=22;
            }
             if ($pd=="10"){
                $cash1=20;
            }
        }
        
        if ($masterk=="F8B3B720E968"){
            if ($pd=="01"){
                $cash1=10;
            }
             if ($pd=="02"){
                $cash1=15;
            }
             if ($pd=="03"){
                $cash1=15;
            }
             if ($pd=="04"){
                $cash1=20;
            }
             if ($pd=="05"){
                $cash1=20;
            }
             if ($pd=="06"){
                $cash1=15;
            }
             if ($pd=="07"){
                $cash1=15;
            }
             if ($pd=="08"){
                $cash1=20;
            }
             if ($pd=="09"){
                $cash1=15;
            }
             if ($pd=="10"){
                $cash1=15;
            }
        }
        
        if ($masterk=="F024F95956D4"){
            if ($pd=="01"){
                $cash1=10;
            }
             if ($pd=="02"){
                $cash1=15;
            }
             if ($pd=="03"){
                $cash1=15;
            }
             if ($pd=="04"){
                $cash1=20;
            }
             if ($pd=="05"){
                $cash1=20;
            }
             if ($pd=="06"){
                $cash1=15;
            }
             if ($pd=="07"){
                $cash1=15;
            }
             if ($pd=="08"){
                $cash1=20;
            }
             if ($pd=="09"){
                $cash1=15;
            }
             if ($pd=="10"){
                $cash1=15;
            }
        }
        
        if ($masterk=="A0B765150AB8"){
            if ($pd=="01"){
                $cash1=10;
            }
             if ($pd=="02"){
                $cash1=15;
            }
             if ($pd=="03"){
                $cash1=15;
            }
             if ($pd=="04"){
                $cash1=20;
            }
             if ($pd=="05"){
                $cash1=20;
            }
             if ($pd=="06"){
                $cash1=15;
            }
             if ($pd=="07"){
                $cash1=15;
            }
             if ($pd=="08"){
                $cash1=20;
            }
             if ($pd=="09"){
                $cash1=15;
            }
             if ($pd=="10"){
                $cash1=15;
            }
        }
       
        if ($masterk=="083AF21E12F8"){
            if ($pd=="01"){
                $cash1=10;
            }
             if ($pd=="02"){
                $cash1=15;
            }
             if ($pd=="03"){
                $cash1=15;
            }
             if ($pd=="04"){
                $cash1=20;
            }
             if ($pd=="05"){
                $cash1=20;
            }
             if ($pd=="06"){
                $cash1=15;
            }
             if ($pd=="07"){
                $cash1=15;
            }
             if ($pd=="08"){
                $cash1=20;
            }
             if ($pd=="09"){
                $cash1=15;
            }
             if ($pd=="10"){
                $cash1=15;
            }
        }
   
    if ($masterk=="8813BF23BCC8"){
            if ($pd=="01"){
                $cash1=10;
            }
             if ($pd=="02"){
                $cash1=15;
            }
             if ($pd=="03"){
                $cash1=15;
            }
             if ($pd=="04"){
                $cash1=20;
            }
             if ($pd=="05"){
                $cash1=20;
            }
             if ($pd=="06"){
                $cash1=15;
            }
             if ($pd=="07"){
                $cash1=15;
            }
             if ($pd=="08"){
                $cash1=20;
            }
             if ($pd=="09"){
                $cash1=15;
            }
             if ($pd=="10"){
                $cash1=15;
            }
        }
        if ($masterk=="3C8A1FA10714"){
            if ($pd=="01"){
                $cash1=10;
            }
             if ($pd=="02"){
                $cash1=15;
            }
             if ($pd=="03"){
                $cash1=15;
            }
             if ($pd=="04"){
                $cash1=20;
            }
             if ($pd=="05"){
                $cash1=20;
            }
             if ($pd=="06"){
                $cash1=15;
            }
             if ($pd=="07"){
                $cash1=15;
            }
             if ($pd=="08"){
                $cash1=20;
            }
             if ($pd=="09"){
                $cash1=15;
            }
             if ($pd=="10"){
                $cash1=15;
            }
        }
        
        if ($masterk=="A0B765149F6C"){
            if ($pd=="01"){
                $cash1=10;
            }
             if ($pd=="02"){
                $cash1=15;
            }
             if ($pd=="03"){
                $cash1=15;
            }
             if ($pd=="04"){
                $cash1=20;
            }
             if ($pd=="05"){
                $cash1=20;
            }
             if ($pd=="06"){
                $cash1=15;
            }
             if ($pd=="07"){
                $cash1=15;
            }
             if ($pd=="08"){
                $cash1=20;
            }
             if ($pd=="09"){
                $cash1=15;
            }
             if ($pd=="10"){
                $cash1=15;
            }
        }
         if ($masterk=="8813BF692C10"){
            if ($pd=="01"){
                $cash1=10;
                $comsum=1;
            }
             if ($pd=="02"){
                $cash1=15;
                $comsum=1;
            }
             if ($pd=="03"){
                $cash1=15;
                $comsum=1;
            }
             if ($pd=="04"){
                $cash1=20;
                $comsum=1;
            }
             if ($pd=="05"){
                $cash1=20;
                $comsum=1;
            }
             if ($pd=="06"){
                $cash1=15;
                $comsum=1;
            }
             if ($pd=="07"){
                $cash1=15;
                $comsum=1;
            }
             if ($pd=="08"){
                $cash1=20;
                $comsum=1;
            }
             if ($pd=="09"){
                $cash1=15;
                $comsum=1;
            }
             if ($pd=="10"){
                $cash1=15;
                $comsum=1;
            }
        }
        
        if ($result = mysqli_query($conexion,"SELECT * FROM validates WHERE masterkey='$masterk'"))
        {
        						
            while($ver=mysqli_fetch_row($result))
            {
        		if($ver[1]==$mastk || $ver[2]=="01")
        		{
        			$resultv=mysqli_query($conexion,"SELECT * FROM machines WHERE masterkey='$masterk'");
        			while($verv=mysqli_fetch_row($resultv)){
        			    
        			    $status=$verv[6];
        			    
        			   // if ($status=0){
        			        
        			        $newconsumeda =  $ver[4] + $consum;
        			        $newcount = $ver[5] - $consum;
        									
        			        $sql0 = "UPDATE validates SET consumeda='{$newconsumeda}', count='{$newcount}' WHERE masterkey='{$masterk}' AND product='$pd'";
        			    //}
        			}
        		}	    
        
            }
        }
                        $result1=mysqli_query($conexion,"SELECT * FROM machines WHERE masterkey='$masterk'");
        			    while($ver1=mysqli_fetch_row($result1)){
                            $serial=$ver1[5];
                            $iduser=$ver1[1];
                            $status=$ver1[6];
                        }
                       // if ($status=0){
                            $sql = "INSERT cash SET product='{$pd}', import='{$cash1}', id_masterkey='{$masterk}', serial='{$serial}', date='{$fecha}', id_user='{$iduser}'";
                            $sql1 = "INSERT products SET product='{$pd}', consumed='{$consum}', id_masterkey='{$masterk}', serial='{$serial}', id_user='{$iduser}'";
                        //}   
        			        if($db->query($sql0) === FALSE){ 
                                echo "Error: " . $sql0 . "<br>" . $db->error; 
                                
                            }
                            
                            echo "OK 0. INSERT ID: ";
                            echo $db->insert_id;
                            		
                            
                            if($db->query($sql) === FALSE){ 
                                echo "Error: " . $sql . "<br>" . $db->error; 
                                
                            }
                            
                            echo "OK 1. INSERT ID: ";
                            echo $db->insert_id;
                            		
                            if($db->query($sql1) === FALSE){
                                echo "Error: " . $sql1 . "<br>" . $db->error; 
                                
                            }
                            echo " OK 2. INSERT ID: ";
                            echo $db->insert_id;
        			    //}
        			       
//----------------------------------------------------------------------------
}else{
	echo "No HTTP POST request found";
}
//----------------------------------------------------------------------------


function escape_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}