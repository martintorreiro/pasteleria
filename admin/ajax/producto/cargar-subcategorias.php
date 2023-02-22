<?php
include "../../db.php";
$id_categoria = $_POST['id_categoria'];
$sql = "SELECT * FROM subcategoria WHERE id_categoria=$id_categoria";
$result = $db->query($sql);
while ($fila = $result->fetch_assoc()){
    echo "<option value='".$fila['id']."'>".$fila['nombre']."</option>";
}
?>