
<?php 
	require"php/conexion.php";
	
	$id_user=$_SESSION['id_user'];
	$level=$_SESSION['level'];
	

 
 ?>
<style>
	.device-control {
    padding: 20px;
    }
    
    .device-table {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
    
   
    .table-header {
        background: #f8f9fa;
        font-weight: bold;
    	font-size: 1em;
    	text-align: center;
    }
    
    /* Asegurar que la tabla tenga scroll horizontal en móviles */
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
}
</style>
<div class="container-fluid device-control">
    <div class="row">
    	<div class="col-12">
           <div style="font-size:25px; color:#e55b26; ">Reporte del <?php echo date("d/m/Y", strtotime($date1))?> al <?php echo date("d/m/Y", strtotime($date3))?>
           </div>;
            <h2>Control de Dispositivos</h2>        		
            <div class="table-responsive">
        		<table class="table table-hover device-table table-border">
        		<caption>
                    
        		</caption>
        		<thead class="table-header">
        			<tr>
        				
        				<td width="100" >Dispositivo</td>        				
						<td width="200" >Cliente</td>						
						<td width="200" >Ubicación</td>
        				<td width="100" >Cloro</td>						
						<td width="100" >Pino</td>
						<td width="100" >Multiusos</td>
						<td width="100" >Suavisante</td>
						<td width="100" >Lavatrastes</td>
						<td width="100" >Jabón Color</td>
						<td width="100" >Quita Manchas</td>
						<td width="100" >Sote</td>
						<td width="100" >Desengrante</td>
						<td width="100" >Jabon Ariel</td>
						<td width="100" >Ingreso Total</td>
						
        			</tr>
                </thead>    
        
        			<?php        				
					
					$result=mysqli_query($conexion,"SELECT * FROM machines ORDER BY serial");
						
							
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
							
							
						
							if(ISSET($_POST['search'])){	
								$date1 = date("Y-m-d", strtotime($_POST['date1']));
								$date2 = date("Y-m-d", strtotime($_POST['date2']."+1 days"));							
								$date3 = date("Y-m-d", strtotime($_POST['date2']));
							
							}else{
								$date1 = date("2024-01-01");
								$date2 = date("Y-m-d");
								$date3 = date("Y-m-d", strtotime($date2));	
							}														
								$result3 = mysqli_query($conexion,"SELECT * FROM cash WHERE date BETWEEN '$date1' AND '$date2' AND serial='$mastk'");						
						
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
							
								//Tomar nombre de cliente    
								$resultc = mysqli_query($conexion,"SELECT * FROM users WHERE id='$id'");
								while($verc=mysqli_fetch_row($resultc)){
									$ncliente=$verc[2];
								}
							   
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
							
													
							if ($importemayor==$importp1){
								$barras1="green";
								$texts1="white";
							}else if ($importemenor==$importp1){
								$barras1="red";
								$texts1="yellow";
							}else{
								$barras1="#ece8df";
								$texts1="black";
							}
							if ($importemayor==$importp2){
								$barras2="green";
								$texts2="white";
							}else if ($importemenor==$importp2){
								$barras2="red";
								$texts2="yellow";
							}else{
								$barras2="#ece8df";
								$texts2="black";
							}
							if ($importemayor==$importp3){
								$barras3="green";
								$texts3="white";
							}else if ($importemenor==$importp3){
								$barras3="red";
								$texts3="yellow";
							}else{
								$barras3="#ece8df";
								$texts3="black";
							}
							if ($importemayor==$importp4){
								$barras4="green";
								$texts4="white";
							}else if ($importemenor==$importp4){
								$barras4="red";
								$texts4="yellow";
							}else{
								$barras4="#ece8df";
								$texts4="black";
							}		
							if ($importemayor==$importp5){
								$barras5="green";
								$texts5="white";
							}else if ($importemenor==$importp5){
								$barras5="red";
								$texts5="yellow";
							}else{
								$barras5="#ece8df";
								$texts5="black";
							}
							if ($importemayor==$importp6){
								$barras6="green";
								$texts6="white";
							}else if ($importemenor==$importp6){
								$barras6="red";
								$texts6="yellow";
							}else{
								$barras6="#ece8df";
								$texts6="black";
							}	
							if ($importemayor==$importp7){
								$barras7="green";
								$texts7="white";
							}else if ($importemenor==$importp7){
								$barras7="red";
								$texts7="yellow";
							}else{
								$barras7="#ece8df";
								$texts7="black";
							}
							if ($importemayor==$importp8){
								$barras8="green";
								$texts8="white";
							}else if ($importemenor==$importp8){
								$barras8="red";
								$texts8="yellow";
							}else{
								$barras8="#ece8df";
								$texts8="black";
							}
							if ($importemayor==$importp9){
								$barras9="green";
								$texts9="white";
							}else if ($importemenor==$importp9){
								$barras9="red";
								$texts9="yellow";
							}else{
								$barras9="#ece8df";
								$texts9="black";
							}	
							if ($importemayor==$importp10){
								$barras10="green";
								$texts10="white";
							}else if ($importemenor==$importp10){
								$barras10="red";
								$texts10="yellow";
							}else{
								$barras10="#ece8df";
								$texts10="black";
							}
							
							
					?>
        		<tbody>
        			<tr class="table-active">        				
        				<td style="text-align:center; vertical-align:middle;"><?php echo $mastk ?></td>
        				<td style="text-align:center; vertical-align:middle;"><?php echo $ncliente ?></td>	
						<td style="text-align:center; vertical-align:middle;"><?php echo $ubica ?></td>					
						
						<td style="text-align:center;">
						    <div style="text-shadow: 1px 1px 1px rgba(0,0,0,0.3); border-radius:8px; color:<?php echo $texts1?>; background-color:<?php echo $barras1?>">$ <?php echo number_format($importp1,2)?></div>							
						</td>
						<td style="text-align:center;">
							<div style="text-shadow: 1px 1px 1px rgba(0,0,0,0.3); border-radius:8px; color:<?php echo $texts2?>; background-color:<?php echo $barras2?>">$ <?php echo number_format($importp2,2)?></div>
							</td>
        				<td style="text-align:center;">
							<div style="text-shadow: 1px 1px 1px rgba(0,0,0,0.3); border-radius:8px; color:<?php echo $texts3?>; background-color:<?php echo $barras3?>">$ <?php echo number_format($importp3,2)?></div>
						</td>
						<td style="text-align:center;">
							<div style="text-shadow: 1px 1px 1px rgba(0,0,0,0.3); border-radius:8px; color:<?php echo $texts4?>; background-color:<?php echo $barras4?>">$ <?php echo number_format($importp4,2)?></div>
						</td>
						<td style="text-align:center;">
							<div style="text-shadow: 1px 1px 1px rgba(0,0,0,0.3); border-radius:8px; color:<?php echo $texts5?>; background-color:<?php echo $barras5?>">$ <?php echo number_format($importp5,2)?></div>
						</td>
						<td style="text-align:center;">
							<div style="text-shadow: 1px 1px 1px rgba(0,0,0,0.3); border-radius:8px; color:<?php echo $texts6?>; background-color:<?php echo $barras6?>">$ <?php echo number_format($importp6,2)?></div>
						</td>
						<td style="text-align:center;">
							<div style="text-shadow: 1px 1px 1px rgba(0,0,0,0.3); border-radius:8px; color:<?php echo $texts7?>; background-color:<?php echo $barras7?>">$ <?php echo number_format($importp7,2)?></div>
						</td>
						<td style="text-align:center;">
							<div style="text-shadow: 1px 1px 1px rgba(0,0,0,0.3); border-radius:8px; color:<?php echo $texts8?>; background-color:<?php echo $barras8?>">$ <?php echo number_format($importp8,2)?></div>
						</td>
						<td style="text-align:center;">
							<div style="text-shadow: 1px 1px 1px rgba(0,0,0,0.3); border-radius:8px; color:<?php echo $texts9?>; background-color:<?php echo $barras9?>">$ <?php echo number_format($importp9,2)?></div>
						</td>
						<td style="text-align:center;">
							<div style="text-shadow: 1px 1px 1px rgba(0,0,0,0.3); border-radius:8px; color:<?php echo $texts10?>; background-color:<?php echo $barras10?>">$ <?php echo number_format($importp10,2)?></div>
						</td>
        				<td class="amount-cell text-right align-middle">
							<a href="../datas/reportes/index.php?mk=<?php echo $mastk ?>"><div style="color:#e55b26;">$<?php echo number_format($importtotal,2)?></div></a>
						</td>
					</tr>
        		</tbody>
        			<?php
        			    }
						
        			?>
        		</table>
				
			
				<div class="total-summary">
                        <span>Total de Máquinas: <?php echo $maquinas; ?></span>
                        <span>Gran Total: $<?php echo number_format($importegral); ?></span>
                        <span>Litros Totales: <?php echo number_format($litrosgral, 2); ?></span>
                    </div>
				
        	</div>
        </div>
    </div>    
</div>