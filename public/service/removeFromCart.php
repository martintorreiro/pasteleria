<?php
include "../db.php";


if (isset($_POST['id_producto'])){

    $id_producto=$_POST['id_producto'];

    if (!isset($_SESSION['carrito'])){
        $_SESSION['carrito'] = array();
    }
  
    if($id_producto=="all"){
        unset($_SESSION['carrito']);
    }else{
        foreach($_SESSION['carrito'] as $clave=>$valor){

            if ($valor['id_producto']==$id_producto){
                unset($_SESSION['carrito'][$clave]);
            }
    
        }
    }

}

echo "OK";
?>