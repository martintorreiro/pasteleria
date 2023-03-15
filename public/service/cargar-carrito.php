<?php
include "../db.php";

if(isset($_SESSION["carrito"])){

    $cadena = "<ul>";
    $subtotal=0;
    if(count($_SESSION["carrito"])<1){
        echo "<p>YOU HAVE NO ITEMS IN YOUR SHOPING CART";
    }else{

        foreach($_SESSION['carrito'] as $clave=>$valor){

            $id_producto =  $_SESSION['carrito'][$clave]['id_producto'];
            $cantidad = $_SESSION['carrito'][$clave]['cantidad'];
            $res = $db->query("SELECT p.*,fp.nombre AS img FROM producto p LEFT JOIN fotos_producto fp 
                        ON fp.id_producto = p.id WHERE p.id = $id_producto GROUP BY p.id");

            if($row = $res->fetch_assoc()){
    
                $subtotal += $row["precio"]*$cantidad;
                

                $cadena .= "<li class='padd-10 flex jc-sb ai-start'>
                                <img class='w-70' src='fotos-producto/".$row["img"]."' alt='foto producto'>
                                
                                <div class='flex column jc-sb h-x-100 padd-0-10 w-160 '>
                                    <p class='mayu bold of-ellipsis'>".$row["nombre"]."</p>
                                    <span class='font-s-16 color-naranja bold'>".$row["precio"]*$cantidad."$</span>
                                    
                                    
                                    <div class='cantidad-carrito flex marg-l-5 marg-t-5 '>
                                        <button data-id_producto='".$id_producto."' data-cantidad='-1' class='añadircarrito'>-</button>
                                        <input data-id_producto='".$id_producto."' class='cantidad-producto positive-integer' type='text' value='".$cantidad."'>
                                        <button data-id_producto='".$id_producto."' class='añadircarrito'>+</button>
                                    </div>
                                </div>
                                
                                <button data-id_producto='".$id_producto."' data-cantidad='all' class='añadircarrito padd-0-10 hover-color-naranja'>
                                    <i class='fa-regular fa-trash-can font-s-18'></i>
                                </button>

                            </li>";
                
            }
    
        }
    
        $cadena .= "</ul>
                    
                    <div class='flex jc-sb ai-center marg-t-20'>
                        <span class='font-s-16 bold'>CART SUBTOTAL :</span>
                        <span class='font-s-20 bold color-naranja'>".$subtotal."$</span>
                    </div>
                    <div class='marg-t-30 flex column ai-center'>
                        <a href='#' class='d-line-block ta-center bg-color-naranja color-blanco w-x-100 padd-10-0 hover-bg-negro'>PROCEED TO CHECKOUT</a>
                        <a href='carrito.php' class='color-negro-letra marg-t-20 hover-color-naranja'>VIEW AND EDIT CART</a>
                    </div>";
        echo $cadena;

    }

   
}
?>