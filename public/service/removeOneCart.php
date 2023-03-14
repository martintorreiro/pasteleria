<?php
include "../db.php";


if (isset($_POST['id_producto'])){

    $id_producto=$_POST['id_producto'];

    if (!isset($_SESSION['carrito'])){
        $_SESSION['carrito'] = array();
    }

    $actualizado=false;
    foreach($_SESSION['carrito'] as $clave=>$valor){
        if ($valor['id_producto']==$id_producto){
            $_SESSION['carrito'][$clave]['cantidad'] = $_SESSION['carrito'][$clave]['cantidad']-1;
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