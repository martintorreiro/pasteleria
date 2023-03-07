<?php
    include "../db.php";

    $idPost = $_GET["idPost"];

    $consulta = "SELECT * FROM comentarios_producto WHERE id_producto=$idPost";
    $res = $db->query($consulta);

 
?>

<div>
    <div>
        <h3 class="font-s-18 marg-b-15">CUSTOMER REVIEWS</h3>
        <ul class="borde-gris padd-27">
            <?php
                
                while($row = $res->fetch_assoc()){
                    echo "<li>".$row["nombre"]."</li>";
                }
            ?>
        </ul>
    </div>
    

</div>