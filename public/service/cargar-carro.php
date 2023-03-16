<?php
include "../db.php"; 
    
    if(!isset($_SESSION["carrito"])||count($_SESSION["carrito"])<1){
        echo "<p>YOU HAVE NO ITEMS IN YOUR SHOPING CART</p>";
    }else{
        $gastoTotal = 0;
        $cadena = "<div class='w-x-70 padd-0-20'>
        <table class='w-x-100'>
            <tr>
                <th class='padd-10'>Item</th>
                <th class='padd-10'>Price</th>
                <th class='padd-10'>Qty</th>
                <th class='padd-10'>Subtotal</th>
            </tr>";
        foreach($_SESSION['carrito'] as $clave=>$valor){

            
            $id_producto =  $_SESSION['carrito'][$clave]['id_producto'];
            $cantidad = $_SESSION['carrito'][$clave]['cantidad'];
            $res = $db->query("SELECT p.*,fp.nombre AS img FROM producto p LEFT JOIN fotos_producto fp 
                ON fp.id_producto = p.id WHERE p.id = $id_producto GROUP BY p.id");

            if($row = $res->fetch_assoc()){
                $subtotal = $row["precio"]*$cantidad;
                $gastoTotal += $subtotal;
                $cadena .= "<tr>
                            <td class='padd-10' align='center'><img class='w-100' src='fotos-producto/".$row["img"]."' alt='foto producto'></td>
                            <td align='center'>$".$row["precio"]."</td>
                            <td align='center'>
                                <div class='cantidad-carrito flex jc-center ai-center marg-l-5 marg-t-5 '>
                                    <button data-id_producto='".$id_producto."' data-cantidad='-1' class='añadircarrito'>-</button>
                                    <input data-id_producto='".$id_producto."' class='cantidad-producto positive-integer' type='text' value='".$cantidad."'>
                                    <button data-id_producto='".$id_producto."' class='añadircarrito'>+</button>
                                </div>
                            </td>
                            <td align='center'>$".$subtotal."</td>
                            <td align='center'>
                                <button data-id_producto='".$id_producto."' data-cantidad='all' class='añadircarrito padd-0-10 hover-color-naranja'>
                                    <i class='fa-regular fa-trash-can font-s-18'></i>
                                </button>
                            </td>
                            </tr>";
            
            }
       
        }

        $cadena .=" </table>
                    </div>
                    <div class='w-x-30 padd-0-20'>
                        <h3 class='font-s-22 padd-0-20'>Summary</h3>
                        <div class='flex jc-sb padd-0-20 marg-t-20'>
                            <span>Subtotal</span>
                            <span>$".$gastoTotal."</span>
                        </div>

                        <a href='checkout.php' class='marg-t-20 d-line-block ta-center bg-color-naranja color-blanco w-x-100 padd-10-0 hover-bg-negro'>
                        PROCEED TO CHECKOUT
                        </a>
                    </div>";

        echo $cadena;

    }

?>