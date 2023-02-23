<?php

include "../../db.php";

if($_POST){
    
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];
    $descripcion = $_POST["descripcion"];
    $gluten = isset($_POST["gluten"])?1:0;
    $subcategoria = $_POST["subcategoria"];
    $imagenes = $_FILES["imagenes"];


    $consulta = "INSERT INTO producto (nombre,precio,stock,descripcion,gluten_free,id_subcategoria)
                VALUES ('$nombre','$precio','$stock','$descripcion','$gluten','$subcategoria')";
    $res = $db->query($consulta);   
    
    $respuesta = new stdClass();

    $idProducto = $db->insert_id;
    
    if($res&&isset($imagenes)){

        $total = count($imagenes['name']);

        for( $i=0 ; $i < $total ; $i++ ){

            $imagen = $imagenes['name'][$i];
            $tmpFilePath = $imagenes['tmp_name'][$i];

            if ($tmpFilePath != ""){

                $newFilePath = "../../fotos-producto/" . $imagenes['name'][$i];

                if(move_uploaded_file($tmpFilePath, $newFilePath)){

                    $consulta =  "INSERT INTO fotos_producto (nombre,id_producto) 
                        VALUES ('$imagen',$idProducto)";
                    $res = $db->query($consulta);

                    if(!$res){
                        unlink($newFilePath);
                    }else{
                        $respuesta->estado="ok";
                        $respuesta->mensaje="Imagenes guardadas correctamente.";

                        echo json_encode($respuesta) ;
                    } 

                }
            }
        }
    }

    
}

?>