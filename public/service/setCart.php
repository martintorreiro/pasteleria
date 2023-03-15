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

            if(!$cantidad==0&&$_SESSION['carrito'][$clave]['cantidad']!==$cantidad){
                $_SESSION['carrito'][$clave]['cantidad'] = $cantidad;
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