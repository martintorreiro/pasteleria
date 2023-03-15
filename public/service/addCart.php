<?php
include "../db.php";

//unset($_SESSION['carrito']);

if (isset($_POST['id_producto'])){

    $id_producto=$_POST['id_producto'];
    
    if (isset($_POST['cantidad'])){
        $cantidad = $_POST['cantidad'];
    }else{
        $cantidad = 1;
    }

    if (!isset($_SESSION['carrito'])){
        $_SESSION['carrito'] = array();
    }

    $actualizado=false;
    foreach($_SESSION['carrito'] as $clave=>$valor){

        if ($valor['id_producto']==$id_producto){

            if($cantidad=="all"){
                unset($_SESSION['carrito'][$clave]);
            }else{

                $_SESSION['carrito'][$clave]['cantidad'] = $_SESSION['carrito'][$clave]['cantidad']+$cantidad;
    
                if($_SESSION['carrito'][$clave]['cantidad']<1){
                    unset($_SESSION['carrito'][$clave]);
                   }
            }

            $actualizado=true;

        }
    }

    if ($actualizado==false){
        
        $elemento_carrito = array("id_producto"=>$id_producto,"cantidad"=>$cantidad);

        $_SESSION['carrito'][] = $elemento_carrito;
    }

}

echo "OK";
?>