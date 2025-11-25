<?php 
session_start();

require "../php/conexion2.php";
$conexion=conexion();
$u=$_SESSION['usuario'];
$a=$_SESSION['afiliado'];
$o=$_SESSION['orden'];

?>


<style type="text/css">
    .bg1 { background:#FFFFFF; color:#000; }
    .bg2 { background:#D5D5D6; color:#000; }
    .bt3 {padding:6px;border-radius:10%;}
    .btb {background-color:red;color:white;width:50px;}
    .btb:hover{background-color:#e55b26;}
</style>
</div>
    <table border="2" bordercolor="#0C5289" align="center" class="table table-striped" cellspacing="0" >
         <tr>
             <td><span style="font-weight:bold;font-size:16px;">Cliente</span></td>
             <td><span style="font-weight:bold;font-size:16px;">Orden</span></td>
             <td><span style="font-weight:bold;font-size:16px;">Importe</span></td>
             <td><span style="font-weight:bold;font-size:16px;">Fecha Pedido</span></td>
             
             <td><span style="font-weight:bold;font-size:16px;">Eliminar</span></td>
         </tr>
<?php
 //$usuario=$_GET[user];
    
     $count=0;
     $stotal=0;
     $total=0;
     if ($result = mysqli_query($conexion,"SELECT * FROM orden")){
        while($ver=mysqli_fetch_row($result)){
            $orden=$ver[0];
            $total=number_format($ver[2],2);
            $id_user=$ver[1];
            $fecha=$ver[3];
            $fila=$count/2;
                        if (is_int($fila)) {
                            $estilo='bg2';
                        } 
                        else {
                            $estilo='bg1';
                        }
            $result0 = mysqli_query($conexion,"SELECT * FROM users where id='$id_user'");
            while($ver0=mysqli_fetch_row($result0)){
                if ($ver0[0]=$id_user){
                        $cliente=$ver0[2];
                    
                }    
                    
                }    
            
            $result1 = mysqli_query($conexion,"SELECT * FROM orden_articulos where clave='$ver[5]'");
            while($ver1=mysqli_fetch_row($result1)){
                if ($ver1[1]=$ver[5]){
                        $descripcion=$ver1[2];
                    
                }    
                    
                }    
                    echo '<tr class="'.$estilo.'">';
                    echo '<td width="400" align="left">'.$cliente."</td>";
			        echo '<td width="100">'.$orden."</td>";
			        echo '<td width="100">'.$total."</td>";
			        echo '<td width="150">'.$fecha."</td>";
			        echo '<td width="150" align="right">'."$ ".$subtotal."</td>";
			        echo '<td width="150"> <button class="bt3 btb" id="btnBorrar" href="componentes/borrar.php?id='.$ver[0].'"><i class="fa fa-trash-o fa-lg"></i></a></td>';
			$count=$count+1;
            $stotal=number_format(($stotal+$ver[6]),0);
            $it=$it+$subt;
            $itotal=number_format($it,2);
            
        }    
        
     }  
     ?>
</table>  
<div id="wb_LayoutGrid1">
        <div id="LayoutGrid1-overlay">
        </div>
        <div id="LayoutGrid1">
        <div class="col-1">
        </div>    
        <div class="col-1-padding">    
        </div>
            <div class="col-2">
                <div class="col-2-padding">
                    <div id="wb_txtTotalServ">
                        <p style="font-family:Arial;font-size:13px;line-height:28px;"><span style="font-family:Verdana;font-size:20px;line-height:17.5px;font-weight:bold;">Total de Servicios </span></p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="col-3-padding">
                    <input type="number" id="ebTotalServ" style="display:block;width: 100%;height:24px;z-index:24;text-align:center;font-weight:bold;font-size:25px;background-color:#0C5289;color:#FFFFFF" name="Editbox1" ; value="<?php echo $stotal;?>" spellcheck="false" disabled>
                </div>
            </div>
            <div class="col-4">
                <div class="col-4-padding">
                    <div id="wb_txtImpTotal">
                        <p style="font-family:Arial;font-size:13px;line-height:28px;"><span style="font-family:Verdana;font-size:20px;line-height:17.5px;font-weight:bold;">Importe Total</span></p>
                    </div>
                </div>
            </div>
            <div class="col-5">
                   <input type="double" id="ebImpTotal" style="display:block;width: 100%;height:24px;z-index:26;text-align:center;font-weight:bold;font-size:25px;background-color:#0C5289;color:#FFFFFF";name="Editbox1" value="<?php echo "$ ".$itotal;?>" spellcheck="false" disabled>
                </b>
            </div>
            
        </div>
    </div>
</div>    