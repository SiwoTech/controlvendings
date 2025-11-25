
<?php 
	require"php/conexion.php";
	
	$id_user=$_SESSION['id_user'];
	$level=$_SESSION['level'];
	

 
 ?>
    <style>
        .device-table {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .percentage-column {
            width: 100px; /* Ancho fijo para todas las columnas de porcentajes */
            min-width: 100px;
            width: 100px;
        }                    
                        
        .percentage-container {
            width: 100%;
            height: 100px; /* Altura fija del contenedor */
            position: relative;
            display: flex;
            align-items: flex-end;
            padding: 5px;
        }
                        
        .percentage-bar {
            width: 100%;
            min-height: 20px;
            border-radius: 4px;
            transition: all 0.3s ease;
            position: relative;
            margin: 0 auto;
        }
                        
        .percentage-text {
            position: absolute;
            width: 100%;
            text-align: center;
            font-size:2em;
        	font-weight: bold;
            text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
            bottom: 50%;
            transform: translateY(50%);
        }
        
        .rest-text {
            position: absolute;
            width: 100%;
            text-align: center;
            font-size:1em;
        	font-weight: bold;
            text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
            bottom: 10%;
            transform: translateY(50%);
        }
        
        .total-summary {
            background: #e55b26;
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            font-size: 2.5em;
        }
                        
        .total-summary span {
            margin: 0 15px;
        }
        
        .amount-cell {
            font-size: 1.7em;
            font-weight: bold;
            color: #e55b26;
            width: 150px;
        }
        
        .device-cell {
            width: 120px;
        	font-size: 1.2em;
        }
        
        .table-header {
            background: #f8f9fa;
            font-weight: bold;
        	font-size: 1em;
        	text-align: center;
        }
        
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
    </style>
        			 
<div class="container-fluid device-control">
    <div class="row">
	    <div class="col-12">
        	<h2>Control de Dispositivos</h2>
        	<div class="table-responsive">
        		<table class="table table-hover device-table">
        		    <caption>
                    
            		</caption>
            		
        
            	    <?php        				
    								
        				$result=mysqli_query($conexion,"SELECT * FROM machines WHERE id_user='$id_user'");
        					
        					
        				//inicializacion de variables generales
        				$importegral=0;
        				$litrosgral=0;
        				$litrostotal=0;						
        				$maquinas=0;								
        					
        				while($ver=mysqli_fetch_row($result)){ 
        					$id=intval($ver[1]);
        					$id_cliente=$ver[1];
        					$mastk=ltrim($ver[5]); //serial
                			$master=ltrim($ver[2]);
                			$ubica=$ver[3];
                			$status=$ver[6];	
                			$maquinas=$maquinas+1;						
                			$importp1=0;
        					$importp2=0;
        					$importp3=0;
        					$importp4=0;
        					$importp5=0;
        					$importp6=0;
        					$importp7=0;
        					$importp8=0;
        					$importp9=0;
        					$importp10=0;
        					$consumedp1=0;
        					$consumedp2=0;
        					$consumedp3=0;
        					$consumedp4=0;
        					$consumedp5=0;
        					$consumedp6=0;
        					$consumedp7=0;
        					$consumedp8=0;
        					$consumedp9=0;
        					$consumedp10=0;
        							
        							
        					$result3 = mysqli_query($conexion,"SELECT * FROM cash WHERE serial='$mastk'");						
    							
        					while($ver3=mysqli_fetch_row($result3)){
        									
        									if($ver3[2]=="01"){
        											$importp1=$importp1+$ver3[3];
        										}
        									if($ver3[2]=="02"){
        											$importp2=$importp2+$ver3[3];
        										}
        									if($ver3[2]=="03"){
        											$importp3=$importp3+$ver3[3];
        										}
        									if($ver3[2]=="04"){
        											$importp4=$importp4+$ver3[3];
        										}
        									if($ver3[2]=="05"){
        											$importp5=$importp5+$ver3[3];
        										}
        									if($ver3[2]=="06"){
        											$importp6=$importp6+$ver3[3];
        										}
        									if($ver3[2]=="07"){
        											$importp7=$importp7+$ver3[3];
        										}
        									if($ver3[2]=="08"){
        											$importp8=$importp8+$ver3[3];
        										}
        									if($ver3[2]=="09"){
        											$importp9=$importp9+$ver3[3];
        										}
        									if($ver3[2]=="10"){
        											$importp10=$importp10+$ver3[3];
        										}													
        					}
    						$importtotal=$importp1+
    									 $importp2+
    									 $importp3+
    									 $importp4+
    									 $importp5+
    									 $importp6+
    									 $importp7+
    									 $importp8+
    									 $importp9+
    									 $importp10;
							
							
								//Filtrado por maquina para niveles   
								$result2 = mysqli_query($conexion,"SELECT * FROM validates WHERE serial='$mastk'");
								while($ver2=mysqli_fetch_row($result2)){
									//Condicionales por producto y asignación de pocentajes y colores
									$alert=30;
									$advert=59;
									if($ver2[2]=="01"){									
										$capap1 = $ver2[3];
										$consp1 = $ver2[4];
										$contp1 = $ver2[5];									
										$consumedp1=$consumedp1+$consp1;
										$contp1p=round($contp1/$capap1*100);
										if ($contp1p<=$alert){
											$barra1="red";
											$text1="yellow";
										}elseif ($contp1p<=$advert){
											$barra1="yellow";
											$text1="red";
										}else{	
											$barra1="green";
											$text1="white";
										}	
									}
									
									if($ver2[2]=="02"){									
										$capap2 = $ver2[3];
										$consp2 = $ver2[4];
										$contp2 = $ver2[5];
										$consumedp2=$consumedp2+$consp2;
										$contp2p=round($contp2/$capap2*100);
										if ($contp2p<=$alert){
											$barra2="red";
											$text2="yellow";
										}elseif ($contp2p<=$advert){
											$barra2="yellow";
											$text2="red";
										}else{	
											$barra2="green";
											$text2="white";
										}	
									}
									if($ver2[2]=="03"){									
										$capap3 = $ver2[3];
										$consp3 = $ver2[4];
										$contp3 = $ver2[5];
										$consumedp3=$consumedp3+$consp3;
										$contp3p=round($contp3/$capap3*100);
										if ($contp3p<=$alert){
											$barra3="red";
											$text3="yellow";
										}elseif ($contp3p<=$advert){
											$barra3="yellow";
											$text3="red";
										}else{	
											$barra3="green";
											$text3="white";
										}							
									}
									if($ver2[2]=="04"){									
										$capap4 = $ver2[3];
										$consp4 = $ver2[4];
										$contp4 = $ver2[5];
										$consumedp4=$consumedp4+$consp4;
										$contp4p=round($contp4/$capap4*100);
										if ($contp4p<=$alert){
											$barra4="red";
											$text4="yellow";
										}elseif ($contp4p<=$advert){
											$barra4="yellow";
											$text4="red";
										}else{	
											$barra4="green";
											$text4="white";
										}											
									}
									if($ver2[2]=="05"){									
										$capap5 = $ver2[3];
										$consp5 = $ver2[4];
										$contp5 = $ver2[5];
										$consumedp5=$consumedp5+$consp5;
										$contp5p=round($contp5/$capap5*100);
										if ($contp5p<=$alert){
											$barra5="red";
											$text5="yellow";
										}elseif ($contp5p<=$advert){
											$barra5="yellow";
											$text5="red";
										}else{	
											$barra5="green";
											$text5="white";
										}						
									}
									if($ver2[2]=="06"){									
										$capap6 = $ver2[3];
										$consp6 = $ver2[4];
										$contp6 = $ver2[5];
										$consumedp6=$consumedp6+$consp6;
										$contp6p=round($contp6/$capap6*100);									
										if ($contp6p<=$alert){
											$barra6="red";
											$text6="yellow";
										}elseif ($contp6p<=$advert){
											$barra6="yellow";
											$text6="red";
										}else{	
											$barra6="green";
											$text6="white";
										}						
									}
									if($ver2[2]=="07"){									
										$capap7 = $ver2[3];
										$consp7 = $ver2[4];
										$contp7 = $ver2[5];
										$consumedp7=$consumedp7+$consp7;
										$contp7p=round($contp7/$capap7*100);
										if ($contp7p<=$alert){
											$barra7="red";
											$text7="yellow";
										}elseif ($contp7p<=$advert){
											$barra7="yellow";
											$text7="red";
										}else{	
											$barra7="green";
											$text7="white";
										}						
									}
									if($ver2[2]=="08"){									
										$capap8 = $ver2[3];
										$consp8 = $ver2[4];
										$contp8 = $ver2[5];
										$consumedp8=$consumedp8+$consp8;
										$contp8p=round($contp8/$capap8*100);
										if ($contp8p<=$alert){
											$barra8="red";
											$text8="yellow";
										}elseif ($contp8p<=$advert){
											$barra8="yellow";
											$text8="red";
										}else{	
											$barra8="green";
											$text8="white";
										}											
									}
									if($ver2[2]=="09"){									
										$capap9 = $ver2[3];
										$consp9 = $ver2[4];
										$contp9 = $ver2[5];	
										$consumedp9=$consumedp9+$consp9;
										$contp9p=round($contp9/$capap9*100);
										if ($contp9p<=$alert){
											$barra9="red";
											$text9="yellow";
										}elseif ($contp9p<=$advert){
											$barra9="yellow";
											$text9="red";
										}else{	
											$barra9="green";
											$text9="white";
										}										
									}
									if($ver2[2]=="10"){									
										$capap10 = $ver2[3];
										$consp10 = $ver2[4];
										$contp10 = $ver2[5];
										$consumedp10=$consumedp10+$consp10;
										$contp10p=round($contp10/$capap10*100);
										if ($contp10p<=$alert){
											$barra10="red";
											$text10="yellow";
										}elseif ($contp10p<=$advert){
											$barra10="yellow";
											$text10="red";
										}else{	
											$barra10="green";
											$text10="white";
										}												
									}
									$litrostotal=$consumedp1+
												 $consumedp2+
												 $consumedp3+
												 $consumedp4+
												 $consumedp5+
												 $consumedp6+
												 $consumedp7+
												 $consumedp8+
												 $consumedp9+
												 $consumedp10;
								
								}
								$importegral=$importegral+$importtotal;
								$litrosgral=$litrosgral+$litrostotal;
								$importemayor=max($importp1,$importp2,$importp3,$importp4,$importp5,$importp6,$importp7,$importp8,$importp9,$importp10);			 
								$importemenor=min($importp1,$importp2,$importp3,$importp4,$importp5,$importp6,$importp7,$importp8,$importp9,$importp10);
							
			
        			?> 
                    <thead class="table-header">
            			<tr>
            				
            				<td width="100" >Dispositivo</td>        				
    						<td width="100" >Ubicación</td>
            				<td width="100" >Cloro        <br><span style="color: black"><?php echo $contp1;?> Lts.</span></td>
    						<td width="100" >Pino         <br><span style="color: black"><?php echo $contp2;?> Lts.</span></td>
    						<td width="100" >Multiusos    <br><span style="color: black"><?php echo $contp3;?> Lts.</span></td>
    						<td width="100" >Suavisante   <br><span style="color: black"><?php echo $contp4;?> Lts.</span></td>
    						<td width="100" >Lavatrastes  <br><span style="color: black"><?php echo $contp5;?> Lts.</span></td>
    						<td width="100" >Más Color    <br><span style="color: black"><?php echo $contp6;?> Lts.</span></td>
    						<td width="100" >Vanish       <br><span style="color: black"><?php echo $contp7;?> Lts.</span></td>
    						<td width="100" >Sote         <br><span style="color: black"><?php echo $contp8;?> Lts.</span></td>
    						<td width="100" >Desengrante  <br><span style="color: black"><?php echo $contp9;?> Lts.</span></td>
    						<td width="100" >Jabon Ariel  <br><span style="color: black"><?php echo $contp10;?> Lts.</span></td>
    						<td width="100" >Ingreso Total</td>
    						
            			</tr>
                    </thead>    
        			 
        			<tbody>
        			<tr class="table-active">        				
        				<td style="text-align:center; vertical-align:middle;"><?php echo $mastk ?></td>
        				<td style="text-align:center; vertical-align:middle;"><?php echo $ubica ?></td>					
							
						<td class="percentage-column">
                            <div class="percentage-container">
                                <div class="percentage-bar" style="height: <?php echo $contp1p; ?>%; background-color: <?php echo $barra1; ?>">
                                    <span class="percentage-text" style="color: <?php echo $text1?>"><?php echo $contp1p; ?>%</span>
                                </div>
                            </div>
                            
                            
                        </td>
                        <td class="percentage-column">
                            <div class="percentage-container">
                                <div class="percentage-bar" style="height: <?php echo $contp2p; ?>%; background-color: <?php echo $barra2; ?>">
                                    <span class="percentage-text" style="color: <?php echo $text2?>"><?php echo $contp2p; ?>%</span>
                                </div>
                            </div>
                        </td>
                        <td class="percentage-column">
                            <div class="percentage-container">
                                <div class="percentage-bar" style="height: <?php echo $contp3p; ?>%; background-color: <?php echo $barra3; ?>">
                                    <span class="percentage-text" style="color: <?php echo $text3?>"><?php echo $contp3p; ?>%</span>
                                </div>
                            </div>
                        </td>
                        <td class="percentage-column">
                            <div class="percentage-container">
                                <div class="percentage-bar" style="height: <?php echo $contp4p; ?>%; background-color: <?php echo $barra4; ?>">
                                    <span class="percentage-text" style="color: <?php echo $text4?>"><?php echo $contp4p; ?>%</span>
                                </div>
                                
                            </div>
                        </td>
                        <td class="percentage-column">
                            <div class="percentage-container">
                                <div class="percentage-bar" style="height: <?php echo $contp5p; ?>%; background-color: <?php echo $barra5; ?>">
                                    <span class="percentage-text" style="color: <?php echo $text5?>"><?php echo $contp5p; ?>%</span>
                                </div>
                            </div>
                        </td>
                        <td class="percentage-column">
                            <div class="percentage-container">
                                <div class="percentage-bar" style="height: <?php echo $contp6p; ?>%; background-color: <?php echo $barra6; ?>">
                                    <span class="percentage-text" style="color: <?php echo $text6?>"><?php echo $contp6p; ?>%</span>
                                </div>
                            </div>
                        </td>
                        <td class="percentage-column">
                            <div class="percentage-container">
                                <div class="percentage-bar" style="height: <?php echo $contp7p; ?>%; background-color: <?php echo $barra7; ?>">
                                    <span class="percentage-text" style="color: <?php echo $text7?>"><?php echo $contp7p; ?>%</span>
                                </div>
                            </div>
                        </td>
                        <td class="percentage-column">
                            <div class="percentage-container">
                                <div class="percentage-bar" style="height: <?php echo $contp8p; ?>%; background-color: <?php echo $barra8; ?>">
                                    <span class="percentage-text" style="color: <?php echo $text8?>"><?php echo $contp8p; ?>%</span>
                                </div>
                            </div>
                        </td>
                        <td class="percentage-column">
                            <div class="percentage-container">
                                <div class="percentage-bar" style="height: <?php echo $contp9p; ?>%; background-color: <?php echo $barra9; ?>">
                                    <span class="percentage-text" style="color: <?php echo $text9?>"><?php echo $contp9p; ?>%</span>
                                </div>
                            </div>
                        </td>
                        <td class="percentage-column">
                            <div class="percentage-container">
                                <div class="percentage-bar" style="height: <?php echo $contp10p; ?>%; background-color: <?php echo $barra10; ?>">
                                    <span class="percentage-text" style="color: <?php echo $text10?>"><?php echo $contp10p; ?>%</span>
                                </div>
                            </div>
                        </td>
					
        				<td class="amount-cell text-right align-middle">
							<a href="../datas/reportes/index.php?mk=<?php echo $mastk ?>"><div style="color:#e55b26; text-decoration:none">$<?php echo number_format($importtotal,2)?></div></a>
						</td>
					</tr>
        			</tbody>		
        				<?php
				}
				?>				
						
        		
        		</table>
				<div class="total-summary">
                    <span>Total de Máquinas: <?php echo $maquinas; ?></span>
                    <span>Gran Total: $<?php echo number_format($importegral, 2); ?></span>
                    <span>Litros Totales: <?php echo number_format($litrosgral, 2); ?></span>
                </div>	
				<!--<div style="font-size:30px; color:white; background-color: #e55b26">Total de Maquinas: <?php echo $maquinas?> 
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Gran Total: $&nbsp<?php echo number_format($importegral, 2); ?>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Litros: <?php echo $litrosgral; ?></div>-->
				
        	</div>
        </div>
    </div>    
</div>