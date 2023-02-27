<?php

include "../../db.php";


if($_POST){
    
    $id_foto = $_POST["id_foto"];
    $tabla = $_POST["tabla"];
    
    $consulta = "DELETE FROM fotos_$tabla WHERE id = $id_foto";

    $res = $db->query($consulta); 
    
    echo $res ;
}

?>