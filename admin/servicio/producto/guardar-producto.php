<?php

include "../../db.php";

if($_POST){
    
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];
    $descripcion = $_POST["descripcion"];
    $gluten = isset($_POST["gluten"])?1:0;
    $subcategoria = $_POST["subcategoria"];

    
    
    $consulta = "INSERT INTO producto (nombre,precio,stock,descripcion,gluten_free,id_subcategoria)
                             VALUES ('$nombre','$precio','$stock','$descripcion','$gluten','$subcategoria')";
    $res = $db->query($consulta);

    echo $res ;
}

?>