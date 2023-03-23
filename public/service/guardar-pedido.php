<?php
include "../db.php";
include "../includes/generar-pdf.php";
include "../includes/enviar-email.php";

if(isset($_POST["json"])){
    
    $json = json_decode($_POST["json"],true);

    $correo_envio=$json["shipp"]["email"];
    $nombre_envio=$json["shipp"]["nombre"];
    $apellidos_envio=$json["shipp"]["apellidos"];
    $direccion_envio=$json["shipp"]["direccion1"];
    $ciudad_envio=$json["shipp"]["ciudad"];
    $provincia_envio=$json["shipp"]["provincia"];
    $cp_envio=$json["shipp"]["cp"];
    $pais_envio=$json["shipp"]["pais"];
    $telefono_envio=$json["shipp"]["telefono"];
    $metodo_pago=$json["shipp"]["metodo"];

    if($json["bill"]["email"]){
        $correo_facturacion=$json["bill"]["email"];
        $nombre_facturacion=$json["bill"]["nombre"];
        $apellidos_facturacion=$json["bill"]["apellidos"];
        $direccion_facturacion=$json["bill"]["direccion1"];
        $ciudad_facturacion=$json["bill"]["ciudad"];
        $provincia_facturacion=$json["bill"]["provincia"];
        $cp_facturacion=$json["bill"]["cp"];
        $pais_facturacion=$json["bill"]["pais"];
        $telefono_facturacion=$json["bill"]["telefono"];
    }else{
        $correo_facturacion=$json["shipp"]["email"];
        $nombre_facturacion=$json["shipp"]["nombre"];
        $apellidos_facturacion=$json["shipp"]["apellidos"];
        $direccion_facturacion=$json["shipp"]["direccion1"];
        $ciudad_facturacion=$json["shipp"]["ciudad"];
        $provincia_facturacion=$json["shipp"]["provincia"];
        $cp_facturacion=$json["shipp"]["cp"];
        $pais_facturacion=$json["shipp"]["pais"];
        $telefono_facturacion=$json["shipp"]["telefono"];
    }
    
    $consulta = "INSERT INTO venta(correo_envio,nombre_envio,apellidos_envio,telefono_envio,provincia_envio,ciudad_envio,cp_envio,direccion_envio,
    correo_facturacion,nombre_facturacion,apellidos_facturacion,telefono_facturacion,provincia_facturacion,ciudad_facturacion,cp_facturacion,direccion_facturacion) 
    VALUES ('$correo_envio','$nombre_envio','$apellidos_envio','$telefono_envio','$provincia_envio','$ciudad_envio','$cp_envio','$direccion_envio',
    '$correo_facturacion','$nombre_facturacion','$apellidos_facturacion','$telefono_facturacion','$provincia_facturacion','$ciudad_facturacion','$cp_facturacion','$direccion_facturacion')";

    $res = $db->query($consulta);

    $idVenta= $db->insert_id;

    if($res){

        foreach($_SESSION['carrito'] as $clave=>$valor){
            $id_producto =  $_SESSION['carrito'][$clave]['id_producto'];
            $cantidad = $_SESSION['carrito'][$clave]['cantidad'];
            $res = $db->query("SELECT p.*,fp.nombre AS img FROM producto p LEFT JOIN fotos_producto fp 
                                ON fp.id_producto = p.id WHERE p.id = $id_producto GROUP BY p.id");

            if($row = $res->fetch_assoc()){
                $precio = $row["precio"];
                $nombre = $row["nombre"];
                
                $consulta = "INSERT INTO linea_venta(id_venta,id_producto,nombre,precio,cantidad) 
                VALUES ($idVenta,$id_producto,'$nombre','$precio',$cantidad)";
                $res = $db->query($consulta);

                if($res){
                    
                    $estado = "ok";
                }else{
                    $estado =  "error";
                }
            }else{
                $estado = "error";
            }
        }

        if($estado == "ok"){

            $htmlPdf = "<h1></h1>"; // CREAR FACTURA
            $pdf = creaPdf($htmlPdf);

            $htmlEmail = "<div>
                            <h1>Su compra ha sido realizada con éxito.</h1>
                            <div>
                                <h3>Datos de facturacion :</h3>
                                <p>Nombre:<span>$nombre_facturacion</span></p>
                                <p>Dirección:<span>$direccion_facturacion</span></p>
                                <p>Teléfono:<span>$telefono_facturacion</span></p>
                            </div>
                        </div>";

            $emailRes = enviarEmail($correo_facturacion, "Detalles de compra." , $htmlEmail, $pdf);
            $estado = $emailRes; 
        }
        
    }else{
        $estado = "error";
    }
    echo $estado;

}