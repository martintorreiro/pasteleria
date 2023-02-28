<?php

include "../db.php";

if($_POST){
    
    $id = $_POST["id"];
    $tabla = $_POST["tabla"];
    
    $consulta = "DELETE FROM $tabla WHERE id=$id";
    
    $res = $db->query($consulta);

    echo $consulta;
}

?>