<?php
include "../db.php";

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
    
}


$consulta = "INSERT INTO venta(correo_envio,nombre_envio,apellidos_envio,telefono_envio,provincia_envio,ciudad_envio,cp_envio,direccion_envio,
correo_facturacion,nombre_facturacion,apellidos_facturacion,telefono_facturacion,provincia_facturacion,ciudad_facturacion,cp_facturacion,direccion_facturacion) 
VALUES ('$correo_envio','$nombre_envio','$apellidos_envio','$telefono_envio','$provincia_envio','$ciudad_envio','$cp_envio','$direccion_envio',
'$correo_facturacion','$nombre_facturacion','$apellidos_facturacion','$telefono_facturacion','$provincia_facturacion','$ciudad_facturacion','$cp_facturacion','$direccion_facturacion')";

$res = $db->query($consulta);

$idVenta= $db->insert_id();

if($res){
    echo "ok";
}