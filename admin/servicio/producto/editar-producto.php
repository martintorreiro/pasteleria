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
    $imagenes = $_FILES["imagenes"];

    $consulta = "UPDATE producto SET nombre = '$nombre', precio = '$precio',stock = '$stock',
    descripcion = '$descripcion',gluten_free = '$gluten',id_subcategoria = '$subcategoria'
    WHERE id = $id";

    $res = $db->query($consulta);
    
    if($res&&isset($imagenes)){

        $respuesta = new stdClass();

        $total = count($imagenes['name']);

        for( $i=0 ; $i < $total ; $i++ ){

            $imagen = $imagenes['name'][$i];
            $tmpFilePath = $imagenes['tmp_name'][$i];

            if ($tmpFilePath != ""){

                $newFilePath = "../../../public/fotos-producto/" . $imagenes['name'][$i];

                if(move_uploaded_file($tmpFilePath, $newFilePath)){

                    $consulta =  "INSERT INTO fotos_producto (nombre,id_producto) 
                                    VALUES ('$imagen',$id)";
                    $res = $db->query($consulta);

                    if(!$res){
                        unlink($newFilePath);
                        $respuesta->estado="404";
                        $respuesta->mensaje="Error al guardar las imagenes.";
                    }else{
                        $respuesta->estado="ok";
                        $respuesta->mensaje="Imagenes guardadas correctamente.";   
                    } 

                }
            }
        }
        echo json_encode($respuesta) ;
    }else if($res){
        echo "sin imagen";
    }


   

    echo $res ;
}

?>