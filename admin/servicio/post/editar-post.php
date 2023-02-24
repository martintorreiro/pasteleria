<?php

include "../../db.php";

if($_POST){
    
    $id = $_POST["id"];
    $titulo = $_POST["titulo"];
    $texto = $_POST["texto"];
    $fecha = $_POST["fecha"];
    $id_autor = $_POST["autor"];
    $imagenes = $_FILES["imagenes"];


    $consulta = "UPDATE post SET titulo = '$titulo', texto = '$texto',fecha = '$fecha',
                id_usuario = '$id_autor' WHERE id = $id";

    $res = $db->query($consulta);
    
    if($res&&isset($imagenes)){

        $respuesta = new stdClass();

        $total = count($imagenes['name']); 

        for( $i=0 ; $i < $total ; $i++ ){

            $imagen = $imagenes['name'][$i];
            $tmpFilePath = $imagenes['tmp_name'][$i];

            if ($tmpFilePath != ""){

                $newFilePath = "../../fotos-post/" . $imagenes['name'][$i];

                if(move_uploaded_file($tmpFilePath, $newFilePath)){

                    $consulta =  "INSERT INTO fotos_post (nombre,id_post) 
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
        
    }

    echo $res ;
}

?>