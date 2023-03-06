<?php
include "../../db.php";
$id = $_POST['id_tabla'];
$tabla = $_POST["tabla"];
$sql = "SELECT * FROM fotos_$tabla WHERE id_$tabla=$id";
$result = $db->query($sql);
$cadena="";
while ($fila = $result->fetch_assoc()){
    $cadena .= "<div class='imagen-guardada'>
                    <img src='../public/fotos-".$tabla."/".$fila["nombre"]."' alt='imagen guardada'>
                    <button type='button' onClick='borrarFoto(".$fila['id'].",$id,`$tabla`)' class='borrar-imagen'>x</button>
                </div>";
}

echo $cadena;
?>