<?php
    include "../db.php";
    
    if($_POST){
        $idProducto = $_POST["id"];
        $nombre =  $_POST["name"];
        $resumen = $_POST["summary"];
        $comentario = $_POST["review"];
        $notaValue = $_POST["v"];
        $notaQuality = $_POST["q"];
        $notaPrice = $_POST["p"];

        

       $consulta = "INSERT INTO comentarios_producto (nombre,resumen,comentario,nota_valor,nota_precio,nota_calidad,fecha,id_producto)
                                            VALUES ('$nombre','$resumen','$comentario',$notaValue,$notaPrice,$notaQuality,now(),$idProducto)";
        $res=$db->query($consulta);

        $consultaValoracion = "SELECT ROUND(((AVG(nota_calidad) + AVG(nota_valor) + AVG(nota_precio))/3)*20) AS valoracion FROM comentarios_producto WHERE id_producto=$idProducto";
        $resValoracion = $db->query($consultaValoracion);

        if($valoracion = $resValoracion -> fetch_assoc()){
            $val = $valoracion["valoracion"];
            $gurdarValoracion = "UPDATE producto SET valoracion = $val WHERE id = $idProducto";
            $resGuardarValoracion = $db->query($gurdarValoracion);
        }
        
        
        echo $gurdarValoracion;
    }

?>