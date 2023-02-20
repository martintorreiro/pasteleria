<?php
include "../db.php";

$consultaCat = "SELECT * FROM categoria";
$resCat = $db->query($consultaCat);
$consultaSub = "SELECT * FROM subcategoria";
$resSub = $db->query($consultaSub);

function filtradoSub($id,$resSub)
{
    return ($resSub["id"] == $id);
}

    $cadena = "";
    
    while($row = $resCat->fetch_assoc()){

        $subFiltrada =  filtradoSub($row["id"],$resSub);
        $cadenaSub="";
        while($rowSub = $subFiltrada->fetch_assoc()){
            $cadenaSub .= "<td>".$rowSub["nombre"]."</td>
                           <td><button data-id=".$rowSub['id']." class='editarSub'><i class='fa-solid fa-pen-to-square'></i></button></td>
                           <td><button data-id=".$rowSub['id']." class='borrarSub'><i class='fa-solid fa-trash'></i></button></td>
            ";
            } 
        

        $cadena .="<tr>
                <td rowspan=".count($subFiltrada).">".$row['nombre']."</td>
                <td rowspan=".count($subFiltrada)."><button data-id=".$row['id']." class='editarCat'><i class='fa-solid fa-pen-to-square'></i></button></td>
                <td rowspan=".count($subFiltrada)."><button data-id=".$row['id']." class='borrarCat'><i class='fa-solid fa-trash'></i></button></td>".$cadenaSub."
            </tr>";
    };

        echo $cadena;
?>