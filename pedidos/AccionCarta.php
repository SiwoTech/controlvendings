<?php
session_start();
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: " . $_SESSION['from'] . "\r\n";

$usuario=$_SESSION['usuario'];
$id_user=$_SESSION['id_user'];
$fileName=$_SESSION['file'];
$headers.=$_SESSION['from'];
$user=$_SESSION['USER'];
$direc=$_SESSION['direccion'];
$tel=$_SESSION['telefono'];
$producto=$_SESSION['producto'];



date_default_timezone_set("America/Mexico_City");
// Iniciamos la clase de la carta
include 'La-carta.php';
$cart = new Cart;

//dir names
$uploadDir="comprobantes/uploads/";

//email
$to ="soporteorangecleanwork@gmail.com";
$subject="Pedido de Suministros Vending";


// include database configuration file
include 'Configuracion.php';
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        // get product details
        $query = $db->query("SELECT * FROM mis_productos WHERE id = ".$productID);
        $row = $query->fetch_assoc();
        $itemData = array(
            'id' => $row['id'],
            'name' => $row['name'],
			'description' => $row['description'],
            'price' => $row['price'],
            'qty' => 1
        );
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'VerCarta.php':'index.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: VerCarta.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])){
        // insert order details into database
        $insertOrder = $db->query("INSERT INTO orden (customer_id, total_price, created, modified) VALUES ('".$_SESSION['sessCustomerID']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')");
        
        if($insertOrder){
            $orderID = $db->insert_id;
            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $fileNameNew=$orderID."_".$id_user.".pdf";
                rename($uploadDir.$fileName,$uploadDir.$fileNameNew);
                
                $sql .= "INSERT INTO orden_articulos (order_id, product_id, quantity) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');";

                
                
               // $file="https://www.cleanworkorange.com/qn/vending/datas/pedidos/comprobantes/uploads/".$orderID."_".$id_user.".pdf";
               
                
                $message = "El cliente ".$usuario." solicita los siguientes suministros para su maquina vending, con numero de orden ".$orderID.
                " 
                direccion de envio ".$direc.
                " 
                telefono de contacto: ".$tel." 
                ";
                
               // Enviar correo
                if (!mail($to, $subject, $message, $headers)) {
                    echo "Error al enviar el correo.";
                }
            }
            // insert order items into database
            $insertOrderItems = $db->multi_query($sql);
            
            if($insertOrderItems){
                $cart->destroy();
                header("Location: OrdenExito.php?id=$orderID");
            }else{
                header("Location: Pagos.php");
            }
        }else{
            header("Location: Pagos.php");
        }
    }else{
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}