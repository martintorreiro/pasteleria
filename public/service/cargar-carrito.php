<?php
include "../db.php";

if(isset($_SESSION["carrito"])){

    $cadena = "<ul>";
    
    if(count($_SESSION["carrito"])<1){
        echo "<p>YOU HAVE NO ITEMS IN YOUR SHOPING CART";
    }else{

        foreach($_SESSION['carrito'] as $clave=>$valor){

            $id_producto =  $_SESSION['carrito'][$clave]['id_producto'];
            $cantidad = $_SESSION['carrito'][$clave]['cantidad'];
            $res = $db->query("SELECT p.*,fp.nombre AS img FROM producto p LEFT JOIN fotos_producto fp 
                        ON fp.id_producto = p.id WHERE p.id = $id_producto GROUP BY p.id");
            if($row = $res->fetch_assoc()){
    
                $cadena .= "<li class='padd-10 flex jc-sb ai-center '>
                                <img class='w-30' src='fotos-producto/".$row["img"]."' alt='foto producto'>
                                <p class='marg-l-15 mayu bold w-x-100'>".$row["nombre"]."</p>
                                <p class='marg-l-15'>Unidades:</p> 
                                <div class='flex padd-0-10'>
                                    <button data-id_producto='".$id_producto."' data-cantidad='-1' class='añadircarrito'>-</button>
                                    <span>".$cantidad."</span>
                                    <button data-id_producto='".$id_producto."' class='añadircarrito'>+</button>
                                </div>
                                <p>Importe</p>
                                <button data-id_producto='".$id_producto."' data-cantidad='all' class='añadircarrito marg-l-10'>x</button>
                            </li>";
                
            }
    
        }
    
        $cadena .= "</ul>";
        echo $cadena;

    }

   
}
?>