<?php

include "../../db.php";

if($_POST){
    
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];
    $descripcion = $_POST["descripcion"];
    $gluten = isset($_POST["gluten"])?1:0;
    $subcategoria = $_POST["subcategoria"];

    
    
    $consulta = "UPDATE producto SET nombre = '$nombre', precio = '$precio',stock = '$stock',
                                    descripcion = '$descripcion',gluten_free = '$gluten',id_subcategoria = '$subcategoria'
                                    WHERE id = $id";
                             
    $res = $db->query($consulta);

    echo $res ;
}

?>