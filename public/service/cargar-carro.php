<?php
include "../db.php";

if(isset($_SESSION["carrito"])){

   
    
    if(count($_SESSION["carrito"])<1){
        echo "<p>YOU HAVE NO ITEMS IN YOUR SHOPING CART</p>";
    }else{

        $cadena = "";
        foreach($_SESSION['carrito'] as $clave=>$valor){

            $id_producto =  $_SESSION['carrito'][$clave]['id_producto'];
            $cantidad = $_SESSION['carrito'][$clave]['cantidad'];
            $res = $db->query("SELECT p.*,fp.nombre AS img FROM producto p LEFT JOIN fotos_producto fp 
                ON fp.id_producto = p.id WHERE p.id = $id_producto GROUP BY p.id");

            if($row = $res->fetch_assoc()){
                $subtotal = $row["precio"]*$cantidad;
                $cadena .= "<tr>
                            <td align='center'><img src='fotos-producto/".$row["img"]."' alt='foto producto'></td>
                            <td align='center'>".$row["precio"]."</td>
                            <td align='center'>
                                <div class='cantidad-carrito flex jc-center ai-center marg-l-5 marg-t-5 '>
                                    <button data-id_producto='".$id_producto."' data-cantidad='-1' class='añadircarrito'>-</button>
                                    <input data-id_producto='".$id_producto."' class='cantidad-producto positive-integer' type='text' value='".$cantidad."'>
                                    <button data-id_producto='".$id_producto."' class='añadircarrito'>+</button>
                                </div>
                            </td>
                            <td align='center'>".$subtotal."</td>
                            </tr>";
            
            }
       
            
        }
        echo $cadena;

    }

   
}
?>